<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MasterStudyProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path file CSV
        $filePath = database_path('seeders/master_study_programs.csv');

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

        // Gunakan updateOrInsert untuk menghindari duplikasi
        foreach ($studyPrograms as $studyProgram) {
            DB::table('master_study_programs')->updateOrInsert(
                ['id' => $studyProgram['id']],  // Kondisi pencarian
                [
                    'name' => $studyProgram['name'],
                    'description' => $studyProgram['description'] ?? '',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        echo "Data berhasil diimpor dari file CSV.\n";
    }
}
