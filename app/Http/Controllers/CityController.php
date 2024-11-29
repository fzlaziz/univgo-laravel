<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class CityController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/districts",
     *     tags={"Districts"},
     *     summary="Get list of districts",
     *     @OA\Response(response=200, description="List of districts"),
     * )
     */

     public function index()
     {
        $districts = City::select('id', 'name')
        ->get()
        ->map(function ($district) {
            $district->name = ucwords(strtolower($district->name));
            return $district;
        });
        return $districts;
     }
}
