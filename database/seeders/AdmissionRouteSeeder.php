<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdmissionRouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admission_routes')->insert([
            [
                'name' => 'Ujian',
                'description' => 'Jalur Masuk Ujian',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mandiri',
                'description' => 'Jalur Masuk Mandiri',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
