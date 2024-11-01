<?php

namespace App\Http\Controllers;

use App\Models\CampusType;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class CampusTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * @OA\Get(
     *     path="/api/campus_types",
     *     tags={"Campus Types"},
     *     summary="Get list of campus types",
     *     @OA\Response(response=200, description="List of campus types"),
     * )
     */

    public function index()
    {
        return CampusType::select('id', 'name')->get();
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
    public function show(CampusType $campusType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CampusType $campusType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CampusType $campusType)
    {
        //
    }
}
