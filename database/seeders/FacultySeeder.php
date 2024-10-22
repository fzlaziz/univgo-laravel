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
        ]);
    }
}
