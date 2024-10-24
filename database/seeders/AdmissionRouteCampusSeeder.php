<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdmissionRouteCampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mencari ID dari campus dengan deskripsi 'polines'
        $campusPolines = DB::table('campuses')->where('id', '1')->first();

        // Mencari ID dari campus dengan deskripsi 'undip'
        $campusUndip = DB::table('campuses')->where('id', '2')->first();

        // Mencari ID dari admission routes
        $admissionUjian = DB::table('admission_routes')->where('name', 'Ujian')->first();
        $admissionMandiri = DB::table('admission_routes')->where('name', 'Mandiri')->first();

        // Memastikan semua ID ditemukan sebelum menyimpan data
        if ($campusPolines && $admissionUjian && $admissionMandiri) {
            DB::table('admission_route_campus')->insert([
                [
                    'campus_id' => $campusPolines->id,
                    'admission_route_id' => $admissionMandiri->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'campus_id' => $campusPolines->id,
                    'admission_route_id' => $admissionUjian->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        } else {
            echo "Salah satu atau lebih data untuk Polines tidak ditemukan.\n";
        }

        // Memastikan ID untuk Undip ditemukan sebelum menyimpan data
        if ($campusUndip && $admissionMandiri && $admissionUjian) {
            DB::table('admission_route_campus')->insert([
                [
                    'campus_id' => $campusUndip->id,
                    'admission_route_id' => $admissionMandiri->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'campus_id' => $campusUndip->id,
                    'admission_route_id' => $admissionUjian->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        } else {
            echo "Salah satu atau lebih data untuk Undip tidak ditemukan.\n";
        }
    }
}
