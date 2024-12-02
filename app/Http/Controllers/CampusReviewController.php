<?php

namespace App\Http\Controllers;

use App\Models\CampusReview;
use Illuminate\Http\Request;
use App\Models\Campus;

class CampusReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
    */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Campus $campus)
    {
        if(!$campus) {
            return response()->json([
                'message' => 'Campus not found',
            ], 404);
        }
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string',
        ]);

        $existingReview = CampusReview::where('campus_id', $campus->id)
            ->where('user_id', $request->user()->id)
            ->first();

        if ($existingReview) {
            return response()->json([
                'success' => false,
                'message' => 'Anda sudah memberikan ulasan untuk kampus ini.',
            ], 409);
        }

        $review = CampusReview::create([
            'campus_id' => $campus->id,
            'user_id' => $request->user()->id,
            'rating' => $validated['rating'],
            'review' => $validated['review'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Review berhasil ditambahkan.',
            'data' => $review,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CampusReview $campusReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CampusReview $campusReview)
    {
        //
    }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, CampusReview $campusReview)
    // {
    //     //
    // }

    public function update(Request $request, $id)
    {
        $review = CampusReview::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->first();

        if (!$review) {
            return response()->json([
                'success' => false,
                'message' => 'Ulasan tidak ditemukan atau Anda tidak memiliki akses untuk mengedit ulasan ini.',
            ], 403);
        }

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string',
        ]);

        $review->update([
            'rating' => $validated['rating'],
            'review' => $validated['review'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Ulasan berhasil diperbarui.',
            'data' => $review,
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CampusReview $campusReview)
    {
        //
    }


}
