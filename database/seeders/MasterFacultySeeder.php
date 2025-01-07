<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MasterFacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path file CSV
        $filePath = database_path('seeders/master_faculties.csv');

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

        // Konversi setiap baris ke array asosiatif
        $faculties = array_map(function ($row) use ($header) {
            return array_combine($header, $row);
        }, $data);

        // Siapkan data untuk di-insert ke database
        $insertData = array_map(function ($faculty) {
            return [
                'name' => $faculty['name'],
                'description' => $faculty['description'] ?? '',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $faculties);

        // Masukkan data ke tabel
        DB::table('master_faculties')->insert($insertData);

        echo "Data berhasil diimpor dari file CSV.\n";
    }
}
