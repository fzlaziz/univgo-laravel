<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        // Baca dan parsing file CSV dengan pemisah titik koma
        $data = array_map(fn($line) => str_getcsv($line, ';'), file($filePath));
        $header = array_shift($data); // Ambil header dari file CSV

        // Ubah setiap baris menjadi array asosiatif
        $rows = array_map(fn($row) => array_combine($header, $row), $data);

        foreach ($rows as $row) {
            DB::table('campuses')->insert([
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
            ]);
        }
    }
}
