<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudyProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mencari ID dari campus dengan deskripsi 'polines'
        $campus = DB::table('campuses')->where('description', 'polines')->first();

        // Mencari ID dari akreditasi yang memiliki nama 'Baik Sekali'
        $accreditation = DB::table('accreditations')->where('name', 'Baik Sekali')->first();

        // Mencari ID dari degree level S1 dan S2
        $degreeLevelS1 = DB::table('degree_levels')->where('name', 'S1')->first();
        $degreeLevelS2 = DB::table('degree_levels')->where('name', 'S2')->first();

        // Mencari ID dari faculty
        $facultyKomputer = DB::table('faculties')->where('name', 'Fakultas Komputer')->first();
        $facultyTeknik = DB::table('faculties')->where('name', 'Fakultas Teknik')->first();

        // Mencari ID dari master study program
        $masterTeknologiRekayasaKomputer = DB::table('master_study_programs')->where('name', 'Teknologi Rekayasa Komputer')->first();
        $masterTeknikMesin = DB::table('master_study_programs')->where('name', 'Teknik Mesin')->first();

        // Memastikan semua ID ditemukan sebelum menyimpan data
        if ($campus && $accreditation && $degreeLevelS1 && $degreeLevelS2 && $facultyKomputer && $facultyTeknik && $masterTeknologiRekayasaKomputer && $masterTeknikMesin) {
            DB::table('study_programs')->insert([
                [
                    'name' => 'Teknik Informatika',
                    'description' => 'Program studi yang mempelajari ilmu komputer dan teknologi informasi.',
                    'campus_id' => $campus->id,
                    'accreditation_id' => $accreditation->id,
                    'degree_level_id' => $degreeLevelS1->id,
                    'faculty_id' => $facultyKomputer->id,
                    'master_study_program_id' => $masterTeknologiRekayasaKomputer->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Teknik Mesin',
                    'description' => 'Program studi yang mempelajari tentang perancangan dan pengembangan mesin.',
                    'campus_id' => $campus->id,
                    'accreditation_id' => $accreditation->id,
                    'degree_level_id' => $degreeLevelS2->id,
                    'faculty_id' => $facultyTeknik->id,
                    'master_study_program_id' => $masterTeknikMesin->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        } else {
            // Jika ada ID yang tidak ditemukan, bisa tambahkan log atau pesan
            echo "Salah satu atau lebih data yang diperlukan tidak ditemukan.\n";
        }
    }
}
