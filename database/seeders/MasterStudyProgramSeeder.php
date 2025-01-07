<?php

namespace Database\Seeders;

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
            return str_getcsv($line, ';');
        }, file($filePath));

        // Ambil header dari baris pertama
        $header = array_shift($data);

        // Validasi jumlah elemen per baris
        $studyPrograms = array_filter(array_map(function ($row) use ($header) {
            if (count($row) !== count($header)) {
                echo "Baris tidak valid ditemukan, melewati baris ini.\n";
                return null; // Abaikan baris yang tidak valid
            }
            return array_combine($header, $row);
        }, $data));

        // Siapkan data untuk di-insert ke database
        $insertData = array_map(function ($program) {
            return [
                'name' => $program['name'],
                'description' => $program['description'] ?? '',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $studyPrograms);

        // Masukkan data ke tabel
        DB::table('master_study_programs')->insert($insertData);

        echo "Data berhasil diimpor dari file CSV.\n";
    }
}
