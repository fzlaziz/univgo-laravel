<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/campuses', function () {
    return DB::table('campuses as c')
        ->join('accreditations as a', 'c.accreditation_id', '=', 'a.id')
        ->select('c.id as campus_id', 'c.name as campus_name', 'c.description as campus_description', 
                    'c.date', 'c.address_latitude', 'c.address_longitude', 'c.web_address', 
                    'c.phone_number', 'c.rank_score', 'c.number_of_graduates', 'c.number_of_registrants',
                    'a.name as accreditation_name')
        ->get()
        ->map(function ($campus) {
            // Mengambil program studi yang berelasi dengan kampus
            $studyPrograms = DB::table('study_programs as sp')
                ->join('accreditations as acc', 'sp.accreditation_id', '=', 'acc.id') // Menyertakan akreditasi
                ->where('sp.campus_id', $campus->campus_id)
                ->select('sp.id', 'sp.name', 'sp.description', 'sp.faculty_id', 'acc.name as accreditation_name') // Ambil faculty_id dan akreditasi
                ->get();

            // Mengambil fakultas berdasarkan faculty_id dari program studi
            $faculties = DB::table('faculties')
                ->whereIn('id', $studyPrograms->pluck('faculty_id')) // Ambil fakultas yang sesuai dengan program studi
                ->get()
                ->map(function ($faculty) use ($studyPrograms) {
                    // Ambil program studi yang sesuai dengan faculty_id
                    $facultyPrograms = $studyPrograms->where('faculty_id', $faculty->id);

                    return [
                        'id' => $faculty->id,
                        'name' => $faculty->name,
                        'description' => $faculty->description,
                        'study_programs' => $facultyPrograms,
                    ];
                });

            // Mengambil degree levels yang berelasi dengan campus melalui pivot table
            $degreeLevels = DB::table('degree_levels as dl')
                ->join('campus_degree_level as cdl', 'dl.id', '=', 'cdl.degree_level_id')
                ->where('cdl.campus_id', $campus->campus_id)
                ->select('dl.id', 'dl.name')
                ->distinct()
                ->get();

            return [
                'campus_id' => $campus->campus_id,
                'campus_name' => $campus->campus_name,
                'campus_description' => $campus->campus_description,
                'date' => $campus->date,
                'address_latitude' => $campus->address_latitude,
                'address_longitude' => $campus->address_longitude,
                'web_address' => $campus->web_address,
                'phone_number' => $campus->phone_number,
                'rank_score' => $campus->rank_score,
                'number_of_graduates' => $campus->number_of_graduates,
                'number_of_registrants' => $campus->number_of_registrants,
                'accreditation_name' => $campus->accreditation_name,
                'faculties' => $faculties,
                'degree_levels' => $degreeLevels,
            ];
        });
});
