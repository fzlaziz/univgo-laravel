<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Campus;
use App\Models\News;
use App\Models\Province;
use App\Models\StudyProgram;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/news', function () {
    return News::with('campus')->get();
});

Route::get('/news/{id}', function ($id) {
    $newsDetail = News::with(['news_comments', 'campus'])->findOrFail($id);
    $relatedNews = News::where('campus_id', $newsDetail->campus_id)
                        ->where('id', '!=', $id)
                        ->get();

    return response()->json([
        'news_detail' => $newsDetail,
        'related_news' => $relatedNews,
    ]);
});

Route::get('/province', function () {
    $provinces = Province::select('id', 'name')->get()->map(function ($province) {
        $province->name = ucwords(strtolower($province->name));
        return $province;
    });
    return $provinces;
});

Route::get('/campuses', function () {
    return Campus::with(['accreditation','district.city.province','campus_rankings','campus_type','degree_levels'])
        ->get()
        ->map(function ($campus) {
            $bestRanking = $campus->campus_rankings->min('rank');
            $rankScore = $bestRanking !== null ? $bestRanking : null;
            return [
                'id' => $campus->id,
                'name' => $campus->name,
                'description' => $campus->description,
                'date' => $campus->date,
                'logo_path' => $campus->logo_path,
                'address_latitude' => $campus->address_latitude,
                'address_longitude' => $campus->address_longitude,
                'web_address' => $campus->web_address,
                'phone_number' => $campus->phone_number,
                'rank_score' => $rankScore,
                'number_of_graduates' => $campus->number_of_graduates,
                'number_of_registrants' => $campus->number_of_registrants,
                'min_single_tuition' => $campus->min_single_tuition,
                'max_single_tuition' => $campus->max_single_tuition,
                'accreditation_id' => $campus->accreditation_id,
                'district' => ucwords(strtolower($campus->district->name)),
                'district_id' => $campus->district->id,
                'city' => ucwords(strtolower($campus->district->city->name)),
                'city_id' => $campus->district->city->id,
                'province' => ucwords(strtolower($campus->district->city->province->name)),
                'province_id' => $campus->district->city->province->id,
                'campus_type_id' => $campus->campus_type->id,
                'campus_type' => $campus->campus_type->name,
                'created_at' => $campus->created_at,
                'updated_at' => $campus->updated_at,
                'accreditation' => [
                    'id' => $campus->accreditation->id,
                    'name' => $campus->accreditation->name,
                    'created_at' => $campus->accreditation->created_at,
                    'updated_at' => $campus->accreditation->updated_at,
                ],
                'degree_levels' => $campus->degree_levels->map(function ($degreeLevel) {
                    return [
                        'id' => $degreeLevel->id,
                        'name' => $degreeLevel->name,
                    ];
                }),
            ];
        });
});

Route::get('/study_programs', function () {
    return StudyProgram::with([
        'campus:id,name',
        'degree_level:id,name'
    ])->get(['id', 'name', 'campus_id', 'degree_level_id'])->map(function ($studyProgram) {
        return [
            'id' => $studyProgram->id,
            'name' => $studyProgram->name,
            'campus' => $studyProgram->campus ? $studyProgram->campus->name : null,
            'degree_level' => $studyProgram->degree_level ? $studyProgram->degree_level->name : null,
        ];
    });
});
