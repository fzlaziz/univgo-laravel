<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Campus;
use App\Models\News;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/news', function () {
    return News::all();
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
        'study_programs.faculty',
        'faculties',
        'degree_levels',
        'admission_routes',
    ])->get();    
});
