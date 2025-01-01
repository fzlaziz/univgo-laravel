<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path file CSV
        $filePath = database_path('seeders/faculties.csv');

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
        $faculties = array_map(function ($row) use ($header) {
            return array_combine($header, $row);
        }, $data);

        // Gunakan updateOrInsert untuk menghindari duplikasi
        foreach ($faculties as $faculty) {
            DB::table('faculties')->updateOrInsert(
                ['id' => $faculty['id']],  // Kondisi pencarian
                [
                    'master_faculty_id' => $faculty['master_faculty_id'],
                    'campus_id' => $faculty['campus_id'],
                    'name' => $faculty['name'],
                    'description' => $faculty['description'] ?? '',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        echo "Data berhasil diimpor dari file CSV.\n";
    }
}
