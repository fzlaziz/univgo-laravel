<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterFacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('master_faculties')->insert([
            [
                'name' => 'Fakultas Teknik',
                'description' => 'Fakultas yang fokus pada bidang teknik dan rekayasa.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fakultas Ilmu Komputer',
                'description' => 'Fakultas yang mengajarkan ilmu komputer, informatika, dan sistem informasi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Keperawatan',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kebidanan',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gizi',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Teknik Radiodiagnostik dan Radioterapi',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kesehatan Gigi',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Analis Kesehatan',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            
            [
                'name' => 'Rekam Medis dan Informasi Kesehatan',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'name' => 'Teknik Mesin',
                'description' => '.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Teknik Elektro',
                'description' => '.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Akuntansi',
                'description' => '.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Administrasi Bisnis',
                'description' => '.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Teknik Sipil',
                'description' => '.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
