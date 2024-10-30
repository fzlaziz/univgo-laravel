<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AccreditationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('accreditations')->insert([
            [
                'name' => 'Unggul',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Baik Sekali',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Baik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'C',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
