<?php

namespace App\Http\Controllers;

use App\Models\Accreditation;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;


class AccreditationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *     path="/api/accreditations",
     *     tags={"Accreditations"},
     *     summary="Get list of accreditations",
     *     @OA\Response(response=200, description="List of accreditations"),
     * )
     */
    public function index()
    {
        return Accreditation::select('id', 'name')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Accreditation $accreditation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Accreditation $accreditation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Accreditation $accreditation)
    {
        //
    }
}
