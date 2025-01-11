<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampusRankingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $id_polines = 1;
        $id_undip = 4;
        $id_unnes = 6;
        $id_udinus = 7;
        $id_poltekkes = 27;

        $webometricsId = DB::table('campus_rankings')->insertGetId([
            'source' => 'Webometrics',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $sirId = DB::table('campus_rankings')->insertGetId([
            'source' => 'SIR',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $icuId = DB::table('campus_rankings')->insertGetId([
            'source' => '4icu',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert into campus_campus_ranking
        DB::table('campus_campus_ranking')->insert([
            [
            'campus_ranking_id' => $webometricsId,
            'campus_id' => $id_undip,
            'rank' => 375,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'campus_ranking_id' => $webometricsId,
            'campus_id' => $id_polines,
            'rank' => 226,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'campus_ranking_id' => $webometricsId,
            'campus_id' => $id_unnes,
            'rank' => 761,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'campus_ranking_id' => $webometricsId,
            'campus_id' => $id_udinus,
            'rank' => 64,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'campus_ranking_id' => $webometricsId,
            'campus_id' => $id_poltekkes,
            'rank' => 122,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'campus_ranking_id' => $sirId,
            'campus_id' => $id_undip,
            'rank' => 3,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'campus_ranking_id' => $sirId,
            'campus_id' => $id_unnes,
            'rank' => 14,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'campus_ranking_id' => $sirId,
            'campus_id' => $id_udinus,
            'rank' => 56,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'campus_ranking_id' => $icuId,
            'campus_id' => $id_undip,
            'rank' => 4,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'campus_ranking_id' => $icuId,
            'campus_id' => $id_unnes,
            'rank' => 21,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'campus_ranking_id' => $icuId,
            'campus_id' => $id_udinus,
            'rank' => 70,
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);
    }
}
