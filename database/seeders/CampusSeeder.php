<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mencari ID dari akreditasi yang memiliki nama 'Baik Sekali'
        $accreditation = DB::table('accreditations')->where('name', 'Baik Sekali')->first();

        if ($accreditation) {
            DB::table('campuses')->insert([
                [
                    'name' => 'Politeknik Negeri Semarang',
                    'description' => 'Kec. Tembalang, Kota Semarang',
                    'date' => '2000-01-01', // Ganti dengan tanggal sesuai kebutuhan
                    'address_latitude' => -6.123456, // Ganti dengan koordinat yang sesuai
                    'address_longitude' => 106.123456, // Ganti dengan koordinat yang sesuai
                    'web_address' => 'https://www.polines.ac.id',
                    'phone_number' => '021-12345678',
                    'rank_score' => 85,
                    'number_of_graduates' => 1500,
                    'number_of_registrants' => 3000,
                    'accreditation_id' => $accreditation->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Universitas Diponegoro',
                    'description' => 'Kec. Tembalang, Kota Semarang',
                    'date' => '2005-05-05', // Ganti dengan tanggal sesuai kebutuhan
                    'address_latitude' => -6.654321, // Ganti dengan koordinat yang sesuai
                    'address_longitude' => 106.654321, // Ganti dengan koordinat yang sesuai
                    'web_address' => 'https://undip.id',
                    'phone_number' => '021-87654321',
                    'rank_score' => 90,
                    'number_of_graduates' => 800,
                    'number_of_registrants' => 1200,
                    'accreditation_id' => $accreditation->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'name' => 'Universitas Negeri Semarang',
                    'description' => 'Kec. Sekaran, Kota Semarang',
                    'date' => '1999-09-09', // Ganti dengan tanggal sesuai kebutuhan
                    'address_latitude' => -6.983321, // Ganti dengan koordinat yang sesuai
                    'address_longitude' => 110.409123, // Ganti dengan koordinat yang sesuai
                    'web_address' => 'https://unnes.ac.id',
                    'phone_number' => '024-8319000',
                    'rank_score' => 85,
                    'number_of_graduates' => 700,
                    'number_of_registrants' => 1100,
                    'accreditation_id' => $accreditation->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                
                [
                    'name' => 'Universitas Dian Nuswantoro',
                    'description' => 'Kec. Semarang Tengah, Kota Semarang',
                    'date' => '2001-07-07', // Ganti dengan tanggal sesuai kebutuhan
                    'address_latitude' => -6.990432, // Ganti dengan koordinat yang sesuai
                    'address_longitude' => 110.420876, // Ganti dengan koordinat yang sesuai
                    'web_address' => 'https://dinus.ac.id',
                    'phone_number' => '024-3517261',
                    'rank_score' => 88,
                    'number_of_graduates' => 650,
                    'number_of_registrants' => 1000,
                    'accreditation_id' => $accreditation->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                
                [
                    'name' => 'Politeknik Kementrian Kesehatan Semarang',
                    'description' => 'Kec. Banyumanik, Kota Semarang',
                    'date' => '1995-06-06', // Ganti dengan tanggal sesuai kebutuhan
                    'address_latitude' => -6.963210, // Ganti dengan koordinat yang sesuai
                    'address_longitude' => 110.435678, // Ganti dengan koordinat yang sesuai
                    'web_address' => 'https://poltekkes-smg.ac.id',
                    'phone_number' => '024-74664321',
                    'rank_score' => 80,
                    'number_of_graduates' => 500,
                    'number_of_registrants' => 900,
                    'accreditation_id' => $accreditation->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        } else {
            // Jika akreditasi tidak ditemukan, bisa tambahkan log atau pesan
            echo "Akreditasi dengan nama 'Baik Sekali' tidak ditemukan.\n";
        }
    }
}
