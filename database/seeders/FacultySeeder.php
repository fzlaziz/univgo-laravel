<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $masterTeknik = DB::table('master_faculties')->where('name', 'Fakultas Teknik')->first();
        $masterIlmuKomputer = DB::table('master_faculties')->where('name', 'Fakultas Ilmu Komputer')->first();

        DB::table('faculties')->insert([
            [
                'master_faculty_id' => $masterTeknik->id,
                'campus_id' => 1,
                'name' => 'Fakultas Teknik',
                'description' => 'Fakultas yang mengajarkan tentang pembangunan infrastruktur dan konstruksi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'master_faculty_id' => $masterIlmuKomputer->id,
                'campus_id' => 2,
                'name' => 'Fakultas Komputer',
                'description' => 'Fakultas yang mempelajari integrasi teknologi informasi dan manajemen.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'master_faculty_id' => 3,
                'campus_id' => 5,
                'name' => 'Jurusan Keperawatan',
                'description' => '.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'master_faculty_id' => 4,
                'campus_id' => 5,
                'name' => 'Jurusan Kebidanan',
                'description' => '.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'master_faculty_id' => 5,
                'campus_id' => 5,
                'name' => 'Jurusan Gizi',
                'description' => '.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'master_faculty_id' => 6,
                'campus_id' => 5,
                'name' => 'Jurusan Teknik Radiodiagnostik dan Radioterapi',
                'description' => '.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'master_faculty_id' => 7,
                'campus_id' => 5,
                'name' => 'Jurusan Kesehatan Gigi',
                'description' => '.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'master_faculty_id' => 8,
                'campus_id' => 5,
                'name' => 'Jurusan Analis Kesehatan',
                'description' => '.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'master_faculty_id' => 9,
                'campus_id' => 5,
                'name' => 'Jurusan Rekam Medis dan Informasi Kesehatan',
                'description' => '.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'master_faculty_id' => 10,
                'campus_id' => 1,
                'name' => 'Teknik Mesin',
                'description' => '.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'master_faculty_id' => 11,
                'campus_id' => 1,
                'name' => 'Teknik Elektro',
                'description' => '.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'master_faculty_id' => 12,
                'campus_id' => 1,
                'name' => 'Akuntansi',
                'description' => '.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'master_faculty_id' => 13,
                'campus_id' => 1,
                'name' => 'Administrasi Bisnis',
                'description' => '.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'master_faculty_id' => 14,
                'campus_id' => 1,
                'name' => 'Teknik Sipil',
                'description' => '.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
