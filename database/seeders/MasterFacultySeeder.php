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
        ]);
    }
}
