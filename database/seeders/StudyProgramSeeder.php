<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class StudyProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path file CSV
        $filePath = database_path('seeders/study_programs.csv');

        // Periksa apakah file CSV ada
        if (!File::exists($filePath)) {
            echo "File CSV tidak ditemukan: $filePath\n";
            return;
        }

        // Baca file CSV dengan pemisah ;
        $data = array_map(function ($line) {
            return str_getcsv($line, ';');  // Menambahkan parameter pemisah ;
        }, file($filePath));

        // Ambil header dari baris pertama
        $header = array_shift($data);

        // Konversi setiap baris ke array asosiatif
        $studyPrograms = array_map(function ($row) use ($header) {
            return array_combine($header, $row);
        }, $data);

        // Gunakan insert untuk menyisipkan data tanpa memeriksa duplikasi
        foreach ($studyPrograms as $studyProgram) {
            // Ambil id untuk relasi yang diperlukan
            $accreditation = DB::table('accreditations')->where('id', $studyProgram['accreditation_id'])->first();
            $degreeLevel = DB::table('degree_levels')->where('id', $studyProgram['degree_level_id'])->first();
            $faculty = DB::table('faculties')->where('id', $studyProgram['faculty_id'])->first();
            $masterStudyProgram = DB::table('master_study_programs')->where('id', $studyProgram['master_study_program_id'])->first();

            // Sisipkan data ke tabel study_programs
            DB::table('study_programs')->insert([
                'name' => $studyProgram['name'],
                'description' => $studyProgram['description'] ?? '',
                'campus_id' => $studyProgram['campus_id'],
                'accreditation_id' => $accreditation->id ?? null,
                'degree_level_id' => $degreeLevel->id ?? null,
                'faculty_id' => $faculty->id ?? null,
                'master_study_program_id' => $masterStudyProgram->id ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        echo "Data berhasil diimpor dari file CSV.\n";
    }
}
