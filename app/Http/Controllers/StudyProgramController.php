<?php

namespace App\Http\Controllers;

use App\Models\StudyProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'campus.campus_rankings',
            'degree_level:id,name',
            'campus.campus_type:id,name',
            'accreditation:id,name',
            'campus.district:id,name,code,city_code',
            'campus.district.city:id,name,code,province_code',
            'campus.district.city.province:id,name,code'
        ])
        ->select([
            'id',
            'name',
            'campus_id',
            'degree_level_id',
            'accreditation_id',
            DB::raw('LEAST(COALESCE((SELECT MIN(rank) FROM campus_campus_ranking WHERE campus_id = study_programs.campus_id), 9999), 9999) as rank_score')
        ])
        ->get()
        ->map(function ($studyProgram) {
            return [
                'id' => $studyProgram->id,
                'name' => $studyProgram->name,
                'rank_score' => $studyProgram->rank_score,
                'accreditation_id' => $studyProgram->accreditation?->id,
                'accreditation' => $studyProgram->accreditation?->name,
                'campus' => $studyProgram->campus?->name,
                'campus_type_id' => $studyProgram->campus?->campus_type?->id,
                'campus_type' => $studyProgram->campus?->campus_type?->name,
                'district' => ucwords(strtolower($studyProgram->campus?->district?->name)),
                'district_id' => $studyProgram->campus?->district?->id,
                'city' => ucwords(strtolower($studyProgram->campus?->district?->city?->name)),
                'city_id' => $studyProgram->campus?->district?->city?->id,
                'province' => ucwords(strtolower($studyProgram->campus?->district?->city?->province?->name)),
                'province_id' => $studyProgram->campus?->district?->city?->province?->id,
                'degree_level' => $studyProgram->degree_level?->name,
                'degree_level_id' => $studyProgram->degree_level?->id,
            ];
        });
    }


    // manual query
    // public function index()
    // {
    //     return StudyProgram::query()
    //         ->select([
    //             'study_programs.id',
    //             'study_programs.name',
    //             'study_programs.campus_id',
    //             'study_programs.degree_level_id',
    //             'study_programs.accreditation_id',
    //         ])
    //         ->join('campuses', 'study_programs.campus_id', '=', 'campuses.id')
    //         ->join('campus_types', 'campuses.campus_type_id', '=', 'campus_types.id')
    //         ->join('indonesia_districts', 'campuses.district_id', '=', 'indonesia_districts.id')
    //         ->join('indonesia_cities', 'indonesia_districts.city_code', '=', 'indonesia_cities.code')
    //         ->join('indonesia_provinces', 'indonesia_cities.province_code', '=', 'indonesia_provinces.code')
    //         ->leftJoin('accreditations', 'study_programs.accreditation_id', '=', 'accreditations.id')
    //         ->leftJoin('degree_levels', 'study_programs.degree_level_id', '=', 'degree_levels.id')
    //         ->leftJoin('campus_campus_ranking', function($join) {
    //             $join->on('campuses.id', '=', 'campus_campus_ranking.campus_id')
    //                 ->whereNull('campus_campus_ranking.deleted_at');
    //         })
    //         ->leftJoin('campus_rankings', 'campus_campus_ranking.campus_ranking_id', '=', 'campus_rankings.id')
    //         ->select([
    //             'study_programs.id',
    //             'study_programs.name',
    //             DB::raw('COALESCE(MIN(campus_campus_ranking.rank), 9999) as rank_score'),
    //             'accreditations.id as accreditation_id',
    //             'accreditations.name as accreditation_name',
    //             'campuses.name as campus_name',
    //             'campus_types.id as campus_type_id',
    //             'campus_types.name as campus_type_name',
    //             DB::raw('LOWER(indonesia_districts.name) as district_name'),
    //             'indonesia_districts.id as district_id',
    //             DB::raw('LOWER(indonesia_cities.name) as city_name'),
    //             'indonesia_cities.id as city_id',
    //             DB::raw('LOWER(indonesia_provinces.name) as province_name'),
    //             'indonesia_provinces.id as province_id',
    //             'degree_levels.id as degree_level_id',
    //             'degree_levels.name as degree_level_name'
    //         ])
    //         ->groupBy([
    //             'study_programs.id',
    //             'study_programs.name',
    //             'accreditations.id',
    //             'accreditations.name',
    //             'campuses.name',
    //             'campus_types.id',
    //             'campus_types.name',
    //             'indonesia_districts.name',
    //             'indonesia_districts.id',
    //             'indonesia_cities.name',
    //             'indonesia_cities.id',
    //             'indonesia_provinces.name',
    //             'indonesia_provinces.id',
    //             'degree_levels.id',
    //             'degree_levels.name'
    //         ])
    //         ->when(request()->has('sort_by_rank'), function($query) {
    //             return $query->orderBy('rank_score', 'asc');
    //         })
    //         ->paginate(20)
    //         ->through(function ($studyProgram) {
    //             return [
    //                 'id' => $studyProgram->id,
    //                 'name' => $studyProgram->name,
    //                 'rank_score' => $studyProgram->rank_score,
    //                 'accreditation_id' => $studyProgram->accreditation_id,
    //                 'accreditation' => $studyProgram->accreditation_name,
    //                 'campus' => $studyProgram->campus_name,
    //                 'campus_type_id' => $studyProgram->campus_type_id,
    //                 'campus_type' => $studyProgram->campus_type_name,
    //                 'district' => ucwords($studyProgram->district_name),
    //                 'district_id' => $studyProgram->district_id,
    //                 'city' => ucwords($studyProgram->city_name),
    //                 'city_id' => $studyProgram->city_id,
    //                 'province' => ucwords($studyProgram->province_name),
    //                 'province_id' => $studyProgram->province_id,
    //                 'degree_level' => $studyProgram->degree_level_name,
    //                 'degree_level_id' => $studyProgram->degree_level_id,
    //             ];
    //         });
    // }

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
