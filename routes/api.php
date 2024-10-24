<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Campus;
use App\Models\News;
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


Route::get('/campuses', function () {
    return Campus::with([
        'accreditation',
    ])->get();    
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