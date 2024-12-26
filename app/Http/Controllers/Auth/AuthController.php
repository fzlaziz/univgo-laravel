<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users', 'email')->whereNull('deleted_at'),
                ],
                'name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('users', 'name')->whereNull('deleted_at'),
                ],
                'password' => 'required|string|min:8|confirmed',
            ]);

            $deletedUser = User::withTrashed()->where('email', $validatedData['email'])->first();
            if ($deletedUser) {
                $deletedUser->forceDelete();
            }

            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'email_verified_at' => null,
            ]);

            event(new Registered($user));
            return response()->json([
                'message' => 'Register Success, please verify your email',
                'verification_url' => $this->getVerificationUrl($user),
            ], 201);

        } catch (ValidationException $e) {
            $errors = $e->errors();
            $errorMessage = $this->getValidationErrorMessage($errors);
            return response()->json(['message' => $errorMessage, 'errors' => $errors], 422);
        } catch (QueryException $e) {
            return response()->json(['message' => "Connection error occurred"], 500);
        } catch (\Exception $e) {
            return response()->json(['message' => 'System error occurred, please try again later'], 500);
        }
    }

    public function verifyEmail(Request $request, $id, $hash)
    {
        try {
            $user = User::findOrFail($id);

            if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
                return response()->json(['message' => 'Invalid verification link'], 400);
            }

            if ($user->hasVerifiedEmail()) {
                return response()->json(['message' => 'Email already verified'], 200);
            }

            $user->markEmailAsVerified();

            return response()->json(['message' => 'Email verified successfully'], 200);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'User not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'System error occurred'], 500);
        }
    }

    public function resendVerificationEmail(Request $request)
    {
        try {
            $user = User::where('email', $request->input('email'))->first();

            if (!$user) {
                return response()->json(['message' => 'User not found'], 404);
            }
            if ($user->hasVerifiedEmail()) {
                return response()->json(['message' => 'Email already verified'], 200);
            }
            $user->sendEmailVerificationNotification();

            return response()->json(['message' => 'Verification email sent'], 200);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to send verification email'], 500);
        }
    }

    private function getVerificationUrl($user)
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->getKey(), 'hash' => sha1($user->getEmailForVerification())]
        );

    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);

            if (!Auth::attempt($request->only('email', 'password'))) {
                return response()->json(['message' => 'Email or password is incorrect'], 401);
            }

            $user = Auth::user();

            if (!$user->hasVerifiedEmail()) {
                Auth::logout();
                return response()->json([
                    'message' => 'Please verify your email before logging in.',
                    'verification_url' => $this->getVerificationUrl($user),
                ], 403);
            }

            $token = $user->createToken('api_token')->plainTextToken;

            return response()->json([
                'message' => 'Login successful',
                'token' => $token,
                'user' => $user,
            ], 200);

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'System error occurred'], 500);
        }
    }

    public function getProfile(Request $request)
    {
        return response()->json(['status' => 'success', 'user' => $request->user()], 200);
    }

    private function getValidationErrorMessage($errors)
    {
        $errorMessage = '';

        if (isset($errors['name'])) {
            $errorMessage .= 'Name is already taken. ';
        }
        if (isset($errors['email'])) {
            $errorMessage .= 'Email is already in use. ';
        }

        if (empty($errorMessage)) {
            $errorMessage = 'Please fill in all required fields.';
        }

        return trim($errorMessage);
    }

    public function changePassword(Request $request)
    {
        $user = auth()->user();

        $validatedData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6',
        ]);

        if (!Hash::check($validatedData['current_password'], $user->password)) {
            return response()->json(['message' => 'Current password is incorrect'], 400);
        }

        $user->password = Hash::make($validatedData['new_password']);
        $user->save();

        return response()->json(['message' => 'Password successfully changed'], 200);
    }


    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => [
                'nullable',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore(auth()->id()),
            ],
        ]);

        $user = auth()->user();

        if ($request->has('name')) {
            $user->name = $request->input('name');
        }
        if ($request->has('email')) {
            $user->email = $request->input('email');
        }

        $user->save();

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user,
            'status_code' => 200,
        ], 200);
    }

    public function updateProfileImage(Request $request)
    {
        try {
            $request->validate([
                'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1000',
            ]);

            if ($request->hasFile('profile_image')) {
                $image = $request->file('profile_image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();

                $path = $image->storeAs(
                    'profile_images',
                    $imageName,
                    env('FILESYSTEM_DISK', 'public')
                );

                $profileImageUrl = Storage::disk(env('FILESYSTEM_DISK', 'public'))->url($path);

                $user = auth()->user();
                $user->profile_image = $profileImageUrl;
                $user->save();

                return response()->json([
                    'status' => 'success',
                    'status_code' => 200,
                    'message' => 'Profile image updated successfully',
                    'profile_image' => $profileImageUrl,
                    'profile_image_url' => $profileImageUrl,
                ]);
            }

            return response()->json([
                'status' => 'error',
                'status_code' => 400,
                'message' => 'No image uploaded'
            ], 400);
        } catch (\Exception $e) {
            Log::error('Failed to update profile image: ', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'status' => 'error',
                'status_code' => 500,
                'message' => 'An error occurred while updating profile image',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            $user = Auth::user();

            if ($user) {
                $user->currentAccessToken()->delete();

                return response()->json([
                    'status_code' => 200,
                    'message' => 'Logged out successfully',
                ], 200);
            } else {
                return response()->json([
                    'status_code' => 401,
                    'message' => 'User not authenticated',
                ], 401);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status_code' => 500,
                'message' => 'Logout failed: ' . $e->getMessage(),
            ], 500);
        }
    }
}
