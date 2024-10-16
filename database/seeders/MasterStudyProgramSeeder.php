<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterStudyProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('master_study_programs')->insert([
            [
                'name' => 'Teknik Mesin',
                'description' => 'Program studi yang mempelajari tentang perancangan, pengembangan, dan produksi mesin.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Teknologi Rekayasa Komputer',
                'description' => 'Program studi yang fokus pada pengembangan teknologi komputer dan rekayasa perangkat keras.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
