<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $polines_id = 1;
        $undip_id = 4;
        $pip = 46;
        $udinus = 7;
        $unnes = 6;
        $uns = 55;
        $poltekkes = 27;
        $uks = 28;

        DB::table('facilities')->insert([
            [
            'name' => 'Ruang Kuliah',
            'description' => '-',
            'file_location' => 'campus-facilities/polines1.jpg',
            'campus_id' => $polines_id,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'Perpustakaan',
            'description' => '-',
            'file_location' => 'campus-facilities/polines2.jpg',
            'campus_id' => $polines_id,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'Laboratorium Pneumatik',
            'description' => '-',
            'file_location' => 'campus-facilities/polines3.jpg',
            'campus_id' => $polines_id,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'Laboratorium Perawatan',
            'description' => '-',
            'file_location' => 'campus-facilities/polines4.jpg',
            'campus_id' => $polines_id,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'Laboratorium CNC',
            'description' => '-',
            'file_location' => 'campus-facilities/polines5.jpg',
            'campus_id' => $polines_id,
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);

        DB::table('facilities')->insert([
            [
            'name' => 'GOR',
            'description' => '-',
            'file_location' => 'campus-facilities/undip1.jpeg',
            'campus_id' => $undip_id,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'Stadion',
            'description' => '-',
            'file_location' => 'campus-facilities/undip2.png',
            'campus_id' => $undip_id,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'Training Center 1',
            'description' => '-',
            'file_location' => 'campus-facilities/undip3.jpeg',
            'campus_id' => $undip_id,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'Training Center 2',
            'description' => '-',
            'file_location' => 'campus-facilities/undip4.jpeg',
            'campus_id' => $undip_id,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'Masjid',
            'description' => '-',
            'file_location' => 'campus-facilities/undip5.jpg',
            'campus_id' => $undip_id,
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);

        DB::table('facilities')->insert([
            [
                'name' => 'Poliklinik',
                'description' => '-',
                'file_location' => 'campus-facilities/pip1.jpg',
                'campus_id' => $pip,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laboratorium Bahasa',
                'description' => '-',
                'file_location' => 'campus-facilities/pip2.jpg',
                'campus_id' => $pip,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Port Shipping',
                'description' => '-',
                'file_location' => 'campus-facilities/pip3.jpg',
                'campus_id' => $pip,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lab Elektro',
                'description' => '-',
                'file_location' => 'campus-facilities/pip4.jpg',
                'campus_id' => $pip,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lab Nautika',
                'description' => '-',
                'file_location' => 'campus-facilities/pip5.jpg',
                'campus_id' => $pip,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('facilities')->insert([
            [
                'name' => 'Rooftop',
                'description' => '-',
                'file_location' => 'campus-facilities/udinus1.png',
                'campus_id' => $udinus,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Meeting Room',
                'description' => '-',
                'file_location' => 'campus-facilities/udinus2.png',
                'campus_id' => $udinus,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ruang Kelas',
                'description' => '-',
                'file_location' => 'campus-facilities/udinus3.png',
                'campus_id' => $udinus,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Poliklinik',
                'description' => '-',
                'file_location' => 'campus-facilities/udinus4.png',
                'campus_id' => $udinus,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Perpustakaan',
                'description' => '-',
                'file_location' => 'campus-facilities/udinus5.png',
                'campus_id' => $udinus,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('facilities')->insert([
            [
                'name' => 'Sport Center',
                'description' => '-',
                'file_location' => 'campus-facilities/unnes1.jpg',
                'campus_id' => $unnes,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pusat Bahasa dan Budaya',
                'description' => '-',
                'file_location' => 'campus-facilities/unnes2.jpg',
                'campus_id' => $unnes,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Perpustakaan',
                'description' => '-',
                'file_location' => 'campus-facilities/unnes3.jpg',
                'campus_id' => $unnes,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Smart Classroom',
                'description' => '-',
                'file_location' => 'campus-facilities/unnes4.jpg',
                'campus_id' => $unnes,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Asrama',
                'description' => '-',
                'file_location' => 'campus-facilities/unnes5.jpg',
                'campus_id' => $unnes,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('facilities')->insert([
            [
                'name' => 'Pusat Kegiatan Mahasiswa',
                'description' => '-',
                'file_location' => 'campus-facilities/uns1.jpg',
                'campus_id' => $uns,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lab Kontrol TV',
                'description' => '-',
                'file_location' => 'campus-facilities/uns2.jpg',
                'campus_id' => $uns,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lab Acara TV',
                'description' => '-',
                'file_location' => 'campus-facilities/uns3.jpg',
                'campus_id' => $uns,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lab Radio',
                'description' => '-',
                'file_location' => 'campus-facilities/uns4.jpg',
                'campus_id' => $uns,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Perpustakaan',
                'description' => '-',
                'file_location' => 'campus-facilities/uns5.jpg',
                'campus_id' => $uns,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
