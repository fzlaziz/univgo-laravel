<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Faculty $faculty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faculty $faculty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculty $faculty)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function study_programs(Faculty $faculty)
    {
        // Load study programs related to the faculty
        $study_programs = $faculty->study_programs()->get();

        return response()->json([
            'faculty' => $faculty,
            'study_programs' => $study_programs,
        ]);
    }
}
