<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampusSeeder extends Seeder
{
    /**
     * Jalankan seeder database.
     */
    public function run(): void
    {
        // Tentukan path file CSV
        $filePath = database_path('seeders/campuses.csv');

        // Periksa apakah file ada
        if (!file_exists($filePath)) {
            $this->command->error("File campuses.csv tidak ditemukan di {$filePath}");
            return;
        }

        // Baca dan parsing file CSV dengan pemisah titik koma
        $data = array_map(fn($line) => str_getcsv($line, ';'), file($filePath));

        // Periksa apakah data kosong
        if (empty($data)) {
            $this->command->error("File campuses.csv kosong atau tidak memiliki data.");
            return;
        }

        // Ambil header dari file CSV
        $header = array_shift($data);

        // Validasi header untuk memastikan kolom yang diperlukan ada (kecuali id)
        $requiredColumns = [
            'name', 'description', 'date_of_establishment', 'logo_path',
            'address_latitude', 'address_longitude', 'web_address', 'phone_number',
            'email', 'youtube', 'instagram', 'number_of_graduates', 'number_of_registrants',
            'min_single_tuition', 'max_single_tuition', 'campus_type_id',
            'accreditation_id', 'district_id'
        ];

        foreach ($requiredColumns as $column) {
            if (!in_array($column, $header)) {
                $this->command->error("Kolom {$column} tidak ditemukan dalam file CSV.");
                return;
            }
        }

        // Ubah setiap baris menjadi array asosiatif
        try {
            $rows = array_map(fn($row) => array_combine($header, $row), $data);
        } catch (\Throwable $e) {
            $this->command->error("Kesalahan saat memproses data CSV: " . $e->getMessage());
            return;
        }

        // Masukkan data ke tabel campuses tanpa kolom id
        $batchData = [];
        foreach ($rows as $row) {
            $batchData[] = [
                'name' => $row['name'],
                'description' => $row['description'],
                'date_of_establishment' => $row['date_of_establishment'],
                'logo_path' => $row['logo_path'],
                'address_latitude' => (float)$row['address_latitude'],
                'address_longitude' => (float)$row['address_longitude'],
                'web_address' => $row['web_address'],
                'phone_number' => $row['phone_number'],
                'email' => $row['email'],
                'youtube' => $row['youtube'],
                'instagram' => $row['instagram'],
                'number_of_graduates' => (int)$row['number_of_graduates'],
                'number_of_registrants' => (int)$row['number_of_registrants'],
                'min_single_tuition' => (int)$row['min_single_tuition'],
                'max_single_tuition' => (int)$row['max_single_tuition'],
                'campus_type_id' => (int)$row['campus_type_id'],
                'accreditation_id' => (int)$row['accreditation_id'],
                'district_id' => (int)$row['district_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Batch insert untuk performa lebih baik
        DB::table('campuses')->insert($batchData);

        $this->command->info("Data kampus berhasil dimasukkan ke database tanpa kolom ID.");
    }
}
