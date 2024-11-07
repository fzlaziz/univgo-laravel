<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DegreeLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('degree_levels')->insert([
            [
                'name' => 'S1',
                'duration' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'S2',
                'duration' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'S3',
                'duration' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'D2',
                'duration' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'D3',
                'duration' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'D4',
                'duration' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
