<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * @OA\Get(
     *     path="/api/campuses",
     *     tags={"Campuses"},
     *     summary="Get list of campuses with details",
     *     @OA\Response(response=200, description="List of campuses with details"),
     * )
     */
    public function index(Request $request)
    {
        $query = Campus::with([
            'accreditation',
            'district.city.province',
            'campus_rankings.campus_ranking',
            'campus_type',
            'degree_levels'
        ]);

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where('name', 'LIKE', "%{$searchTerm}%");
        }

        if ($request->filled('location')) {
            $locationIds = is_array($request->location) ? $request->location : [$request->location];
            $query->whereHas('district.city.province', function($q) use ($locationIds) {
                $q->whereIn('id', $locationIds);
            });
        }

        if ($request->filled('campus_type')) {
            $campusTypeIds = is_array($request->campus_type) ? $request->campus_type : [$request->campus_type];
            $query->whereIn('campus_type_id', $campusTypeIds);
        }

        if ($request->filled('accreditation')) {
            $accreditationIds = is_array($request->accreditation) ? $request->accreditation : [$request->accreditation];
            $query->whereIn('accreditation_id', $accreditationIds);
        }

        if ($request->filled('degree_level')) {
            $degreeLevelIds = is_array($request->degree_level) ? $request->degree_level : [$request->degree_level];
            $query->whereHas('degree_levels', function($q) use ($degreeLevelIds) {
                $q->whereIn('degree_levels.id', $degreeLevelIds);
            });
        }

        if ($request->has('sort_by') && $request->sort_by !== 'nearest') {
            switch ($request->sort_by) {
                case 'min_single_tuition':
                    $query->orderBy('min_single_tuition', 'asc');
                    break;
                case 'max_single_tuition':
                    $query->orderBy('max_single_tuition', 'desc');
                    break;
                case 'rank_score':
                    $query->orderByRaw('LEAST(COALESCE((SELECT MIN(rank) FROM campus_campus_ranking WHERE campus_id = campuses.id), 9999), 9999)');
                    break;
                default:
                    $query->orderBy('name', 'asc');
            }
        }

        return $query->get()->map(function ($campus) {
            $bestRanking = $campus->campus_rankings->min(function ($campusCampusRanking) {
                return $campusCampusRanking->rank;
            });
            $rankScore = $bestRanking !== null ? $bestRanking : 9999;
            return [
                'id' => $campus->id,
                'name' => $campus->name,
                'description' => $campus->description,
                'date_of_establishment' => $campus->date_of_establishment,
                'logo_path' => $campus->logo_path,
                'address_latitude' => (float) $campus->address_latitude,
                'address_longitude' => (float) $campus->address_longitude,
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
                'accreditation' => [
                    'id' => $campus->accreditation->id,
                    'name' => $campus->accreditation->name,
                ],
                'degree_levels' => $campus->degree_levels->map(function ($degreeLevel) {
                    return [
                        'id' => $degreeLevel->id,
                        'name' => $degreeLevel->name,
                        'duration' => $degreeLevel->duration
                    ];
                }),
            ];
        });
    }


    // all query
    // public function index()
    // {
    //     return Campus::with(['accreditation','district.city.province','campus_rankings.campus_ranking','campus_type','degree_levels'])
    //     ->get()
    //     ->map(function ($campus) {
    //         // Find the best ranking across all ranking sources
    //         $bestRanking = $campus->campus_rankings->min(function ($campusCampusRanking) {
    //             return $campusCampusRanking->rank;
    //         });
    //         $rankScore = $bestRanking !== null ? $bestRanking : 9999;
    //         return [
    //             'id' => $campus->id,
    //             'name' => $campus->name,
    //             'description' => $campus->description,
    //             'date_of_establishment' => $campus->date_of_establishment,
    //             'logo_path' => $campus->logo_path,
    //             'address_latitude' => (float) $campus->address_latitude,
    //             'address_longitude' => (float) $campus->address_longitude,
    //             'web_address' => $campus->web_address,
    //             'phone_number' => $campus->phone_number,
    //             'rank_score' => $rankScore,
    //             'number_of_graduates' => $campus->number_of_graduates,
    //             'number_of_registrants' => $campus->number_of_registrants,
    //             'min_single_tuition' => $campus->min_single_tuition,
    //             'max_single_tuition' => $campus->max_single_tuition,
    //             'accreditation_id' => $campus->accreditation_id,
    //             'district' => ucwords(strtolower($campus->district->name)),
    //             'district_id' => $campus->district->id,
    //             'city' => ucwords(strtolower($campus->district->city->name)),
    //             'city_id' => $campus->district->city->id,
    //             'province' => ucwords(strtolower($campus->district->city->province->name)),
    //             'province_id' => $campus->district->city->province->id,
    //             'campus_type_id' => $campus->campus_type->id,
    //             'campus_type' => $campus->campus_type->name,
    //             'accreditation' => [
    //                 'id' => $campus->accreditation->id,
    //                 'name' => $campus->accreditation->name,
    //             ],
    //             'degree_levels' => $campus->degree_levels->map(function ($degreeLevel) {
    //                 return [
    //                     'id' => $degreeLevel->id,
    //                     'name' => $degreeLevel->name,
    //                     'duration' => $degreeLevel->duration
    //                 ];
    //             }),
    //         ];
    //     });
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
    public function show(Campus $campus)
    {
        $campusData = $campus->load([
            'news' => function($query) {
                $query->latest()->limit(5);
            },
            'facilities',
            'galleries',
            'admission_statistics',
            'degree_levels',
            'admission_routes',
            'faculties',
            'campus_registration_records' => function($query) {
                $query->select('id', 'total_registrants', 'year', 'campus_id')
                      ->lastFiveYear();
            },
            'campus_type:id,name',
            'accreditation:id,name',
        ]);

        $campusData = $campusData->toArray();

        $campusData['campus_type'] = $campusData['campus_type']['name'];
        $campusData['accreditation'] = $campusData['accreditation']['name'];

        return $campusData;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Campus $campus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campus $campus)
    {
        //
    }

    public function faculties(Campus $campus)
    {
        $faculties = $campus->faculties()->get();
        return response()->json($faculties);
    }

    public function reviews($campusId, Request $request)
    {
        $campus = Campus::with('reviews.user')->findOrFail($campusId);
        $reviews = $campus->reviews;

        $totalReviews = $reviews->count();
        $averageRating = $reviews->avg('rating');

        if ($request->query('preview') === 'true') {
            $reviews = $reviews->sortBy(function ($review) {
                $daysSinceCreation = now()->diffInDays($review->created_at);
                $recencyScore = max(0, 2.5 - ($daysSinceCreation / 30));
                return -($review->rating + $recencyScore);
            })->take(4);
        }

        $formattedReviews = $reviews->values()->map(function ($review) {
            return [
                'id' => $review->id,
                'user' => $review->user->name,
                'user_id' => $review->user->id,
                'user_profile_image' => $review->user->profile_image,
                'rating' => $review->rating,
                'review' => $review->review,
                'created_at' => $review->created_at->toIso8601String(),
            ];
        });

        return response()->json([
            'success' => true,
            'data' => [
                'total_reviews' => $totalReviews,
                'average_rating' => round($averageRating, 1),
                'reviews' => $formattedReviews,
                'is_preview' => $request->query('preview') === 'true',
            ],
        ]);
    }
    public function top_ten()
    {
        $campusTypes = [
            1 => 'PTN',
            2 => 'Politeknik',
            3 => 'Swasta',
        ];

        $allCampuses = Campus::with([
                'campus_type:id,name',
                'campus_rankings:id,campus_id,rank'
            ])
            ->select([
                'id',
                'name',
                'logo_path',
                'accreditation_id',
                'district_id',
                'campus_type_id'
            ])
            ->withCount('campus_rankings')
            ->orderByRaw($this->getOrderByRawQuery())
            ->get()
            ->groupBy('campus_type_id');

        $topCampuses = collect($campusTypes)->mapWithKeys(function ($typeName, $typeId) use ($allCampuses) {
            $typeCampuses = $allCampuses->get($typeId, collect())
                ->take(10)
                ->map(function ($campus) {
                    $bestRanking = $campus->campus_rankings->min('rank') ?? 9999;

                    return [
                        'id' => $campus->id,
                        'name' => $campus->name,
                        'logo_path' => $campus->logo_path,
                        'rank_score' => $bestRanking,
                        'campus_type_id' => $campus->campus_type->id,
                        'campus_type' => $campus->campus_type->name,
                    ];
                });

            return [$typeName => $typeCampuses->values()];
        });

        return response()->json($topCampuses);
    }

    private function getOrderByRawQuery()
    {
        if (DB::connection()->getDriverName() === 'pgsql') {
            return 'LEAST(COALESCE((SELECT MIN(rank) FROM campus_campus_ranking WHERE campus_id = campuses.id), 9999), 9999)';
        } else {
            return 'LEAST(COALESCE((SELECT MIN(rank) FROM campus_campus_ranking WHERE campus_id = campuses.id), 9999), 9999)';
        }
    }

    public function index_nearest(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        $query = Campus::query()->select([
            'id',
            'name',
            'logo_path',
            'address_latitude',
            'address_longitude',
        ]);

        if ($latitude && $longitude) {
            $latRad = deg2rad($latitude);
            $lonRad = deg2rad($longitude);

            $query->selectRaw("
                (6371 * acos(
                    cos(?) * cos(radians(address_latitude)) *
                    cos(radians(address_longitude) - ?) +
                    sin(?) * sin(radians(address_latitude))
                )) AS distance
            ", [$latRad, $lonRad, $latRad])
            ->orderBy('distance')
            ->limit(4);
        }

        return $query->get()->map(function ($campus) {
            return [
                'id' => $campus->id,
                'name' => $campus->name,
                'logo_path' => $campus->logo_path,
                'address_latitude' => (float) $campus->address_latitude,
                'address_longitude' => (float) $campus->address_longitude,
                'distance' => $campus->distance ?? null,
            ];
        });
    }
}
