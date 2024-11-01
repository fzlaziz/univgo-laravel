<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class DistrictController extends Controller
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
        $districts = District::select('id', 'name')
        ->get()
        ->map(function ($district) {
            $district->name = ucwords(strtolower($district->name));
            return $district;
        });
        return $districts;
     }
}
