<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CampusDegreeLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mencari ID dari campus dengan deskripsi 'polines'
        $campusPolines = DB::table('campuses')->where('id', '1')->first();
        $campusUndip = DB::table('campuses')->where('id', '2')->first();
        $campusUnnes = DB::table('campuses')->where('id', '3')->first();
        $campusUdinus = DB::table('campuses')->where('id', '4')->first();
        $campusPoltekkes = DB::table('campuses')->where('id', '5')->first();

        $S1 = DB::table('degree_levels')->where('name', 'S1')->first();
        $S2 = DB::table('degree_levels')->where('name', 'S2')->first();
        $S3 = DB::table('degree_levels')->where('name', 'S3')->first();
        $MST = DB::table('degree_levels')->where('name', 'S2')->first();
        $D3 = DB::table('degree_levels')->where('name', 'D3')->first();
        $D4 = DB::table('degree_levels')->where('name', 'D4')->first();

        // Memastikan semua ID ditemukan sebelum menyimpan data
        if ($campusPolines) {
            DB::table('campus_degree_level')->insert([
                [
                    'campus_id' => $campusPolines->id,
                    'degree_level_id' => $D3->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'campus_id' => $campusPolines->id,
                    'degree_level_id' => $D4->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'campus_id' => $campusPolines->id,
                    'degree_level_id' => $MST->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        } else {
            echo "Salah satu atau lebih data tidak ditemukan.\n";
        }

        if ($campusUndip) {
            DB::table('campus_degree_level')->insert([
                [
                    'campus_id' => $campusUndip->id,
                    'degree_level_id' => $S1->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'campus_id' => $campusUndip->id,
                    'degree_level_id' => $S2->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'campus_id' => $campusUndip->id,
                    'degree_level_id' => $S3->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'campus_id' => $campusUndip->id,
                    'degree_level_id' => $D3->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'campus_id' => $campusUndip->id,
                    'degree_level_id' => $D4->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        } else {
            echo "Salah satu atau lebih data dak ditemukan.\n";
        }

        if ($campusUnnes) {
            DB::table('campus_degree_level')->insert([
                [
                    'campus_id' => $campusUnnes->id,
                    'degree_level_id' => $S1->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'campus_id' => $campusUnnes->id,
                    'degree_level_id' => $S2->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'campus_id' => $campusUnnes->id,
                    'degree_level_id' => $S3->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        } else {
            echo "Salah satu atau lebih data dak ditemukan.\n";
        }

        if ($campusUdinus) {
            DB::table('campus_degree_level')->insert([
                [
                    'campus_id' => $campusUdinus->id,
                    'degree_level_id' => $S1->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'campus_id' => $campusUdinus->id,
                    'degree_level_id' => $S2->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'campus_id' => $campusUdinus->id,
                    'degree_level_id' => $S3->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        } else {
            echo "Salah satu atau lebih data tidak ditemukan.\n";
        }

        if ($campusPoltekkes) {
            DB::table('campus_degree_level')->insert([
                [
                    'campus_id' => $campusPoltekkes->id,
                    'degree_level_id' => $D3->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'campus_id' => $campusPoltekkes->id,
                    'degree_level_id' => $D4->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        } else {
            echo "Salah satu atau lebih data tidak ditemukan.\n";
        }
    }
}
