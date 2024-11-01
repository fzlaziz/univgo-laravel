<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use OpenApi\Annotations as OA;

class ProvinceController extends Controller
{
    //

    /**
     * @OA\Get(
     *     path="/api/province",
     *     tags={"Provinces"},
     *     summary="Get list of provinces",
     *     @OA\Response(response=200, description="List of provinces"),
     * )
     */

    public function index()
    {
        $provinces = Province::select('id', 'name')->get()->map(function ($province) {
            $province->name = ucwords(strtolower($province->name));
            return $province;
        });
        return $provinces;
    }
}
