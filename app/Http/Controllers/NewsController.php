<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * @OA\Get(
     *     path="/api/news",
     *     tags={"News"},
     *     summary="Get list of news",
     *     @OA\Response(response=200, description="List of news"),
     * )
     */
    public function index()
    {
        return News::with('campus')->get();
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


    /**
     * @OA\Get(
     *     path="/api/news/{news}",
     *     tags={"News"},
     *     summary="Get news detail by ID",
     *     @OA\Parameter(name="news", in="path", required=true, description="News ID", @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="News detail and related news"),
     *     @OA\Response(response=404, description="News not found"),
     * )
     */
    public function show(News $news) // Route model binding
    {
        $relatedNews = News::where('campus_id', $news->campus_id)
                           ->where('id', '!=', $news->id)
                           ->get();

        return response()->json([
            'news_detail' => $news,
            'related_news' => $relatedNews,
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
    }
}
