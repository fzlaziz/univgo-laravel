<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampusTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('campus_types')->insert([
            [
                'name' => 'PTN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Politeknik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Swasta',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
