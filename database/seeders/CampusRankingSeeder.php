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
        $id_undip = 2;
        $id_unnes = 3;
        $id_udinus = 4;
        $id_poltekkes = 5;

        DB::table('campus_rankings')->insert([
            [
                'source' => 'Webometrics',
                'rank' => 375,
                'campus_id' => $id_undip,  // Undip
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'source' => 'Webometrics',
                'rank' => 226,
                'campus_id' => $id_polines,  // Polines
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'source' => 'Webometrics',
                'rank' => 761,
                'campus_id' => $id_unnes,  // Unnes
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'source' => 'Webometrics',
                'rank' => 64,
                'campus_id' => $id_udinus,  // Udinus
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'source' => 'Webometrics',
                'rank' => 122,
                'campus_id' => $id_poltekkes,  // Poltekkes
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('campus_rankings')->insert([
            [
                'source' => 'SIR',
                'rank' => 3,
                'campus_id' => $id_undip,  // Undip
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'source' => 'SIR',
                'rank' => 14,
                'campus_id' => $id_unnes,  // Unnes
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'source' => 'SIR',
                'rank' => 56,
                'campus_id' => $id_udinus,  // Udinus
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('campus_rankings')->insert([
            [
                'source' => '4icu',
                'rank' => 4,
                'campus_id' => $id_undip,  // Undip
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'source' => '4icu',
                'rank' => 21,
                'campus_id' => $id_unnes,  // Unnes
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'source' => '4icu',
                'rank' => 70,
                'campus_id' => $id_udinus,  // Udinus
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
