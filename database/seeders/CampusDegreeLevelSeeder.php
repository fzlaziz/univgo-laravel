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
        $campusPolines = DB::table('campuses')->where('description', 'polines')->first();

        // Mencari ID dari campus dengan deskripsi 'undip'
        $campusUndip = DB::table('campuses')->where('description', 'undip')->first();

        // Mencari ID dari degree level S1 dan S2
        $degreeLevelS1 = DB::table('degree_levels')->where('name', 'S1')->first();
        $degreeLevelS2 = DB::table('degree_levels')->where('name', 'S2')->first();

        // Memastikan semua ID ditemukan sebelum menyimpan data
        if ($campusPolines && $degreeLevelS1 && $degreeLevelS2) {
            DB::table('campus_degree_level')->insert([
                [
                    'campus_id' => $campusPolines->id,
                    'degree_level_id' => $degreeLevelS1->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'campus_id' => $campusPolines->id,
                    'degree_level_id' => $degreeLevelS2->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        } else {
            // Jika ada ID yang tidak ditemukan, bisa tambahkan log atau pesan
            echo "Salah satu atau lebih data untuk Polines tidak ditemukan.\n";
        }

        // Memastikan ID untuk Undip ditemukan sebelum menyimpan data
        if ($campusUndip && $degreeLevelS1 && $degreeLevelS2) {
            DB::table('campus_degree_level')->insert([
                [
                    'campus_id' => $campusUndip->id,
                    'degree_level_id' => $degreeLevelS1->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'campus_id' => $campusUndip->id,
                    'degree_level_id' => $degreeLevelS2->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        } else {
            // Jika ada ID yang tidak ditemukan, bisa tambahkan log atau pesan
            echo "Salah satu atau lebih data untuk Undip tidak ditemukan.\n";
        }
    }
}
