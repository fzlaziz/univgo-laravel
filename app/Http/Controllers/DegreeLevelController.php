<?php

namespace App\Http\Controllers;

use App\Models\DegreeLevel;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class DegreeLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * @OA\Get(
     *     path="/api/degree_levels",
     *     tags={"Degree Levels"},
     *     summary="Get list of degree levels",
     *     @OA\Response(response=200, description="List of degree levels"),
     * )
     */
    public function index()
    {
        return DegreeLevel::select('id', 'name')->get();
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
    public function show(DegreeLevel $degreeLevel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DegreeLevel $degreeLevel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DegreeLevel $degreeLevel)
    {
        //
    }
}
