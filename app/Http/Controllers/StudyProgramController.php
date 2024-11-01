<?php

namespace App\Http\Controllers;

use App\Models\StudyProgram;
use Illuminate\Http\Request;

class StudyProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *     path="/api/study_programs",
     *     tags={"Study Programs"},
     *     summary="Get list of study programs with details",
     *     @OA\Response(response=200, description="List of study programs with details"),
     * )
     */
    public function index()
    {
        return StudyProgram::with([
            'campus:id,name,campus_type_id,district_id',
            'degree_level:id,name',
            'campus.campus_type:id,name',
            'campus.district:id,name',
            'accreditation:id,name',
        ])->get(['id', 'name', 'campus_id', 'degree_level_id','accreditation_id'])->map(function ($studyProgram) {
            return [
                'id' => $studyProgram->id,
                'name' => $studyProgram->name,
                'accreditation_id' => $studyProgram->accreditation ? $studyProgram->accreditation->id : null,
                'accreditation' => $studyProgram->accreditation ? $studyProgram->accreditation->name : null,
                'campus' => $studyProgram->campus ? $studyProgram->campus->name : null,
                'campus_type_id' => $studyProgram->campus->campus_type->id,
                'campus_type' => $studyProgram->campus->campus_type->name,
                'district' => ucwords(strtolower($studyProgram->campus->district->name)),
                'district_id' => $studyProgram->campus->district->id,
                'degree_level' => $studyProgram->degree_level ? $studyProgram->degree_level->name : null,
                'degree_level_id' => $studyProgram->degree_level ? $studyProgram->degree_level->id : null,
            ];
        });
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
    public function show(StudyProgram $studyProgram)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudyProgram $studyProgram)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudyProgram $studyProgram)
    {
        //
    }
}
