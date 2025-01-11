<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CampusRegistrationRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $years = [2020, 2021, 2022, 2023, 2024];

        $campuses = DB::table('campuses')->select('id', 'campus_type_id')->get();

        $campuses->each(function ($campus) use ($years) {
            foreach ($years as $year) {
                DB::table('campus_registration_records')->insert([
                    'campus_id' => $campus->id,
                    'year' => $year,
                    'total_registrants' => $this->getRandomRegistrants($campus->campus_type_id),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        });
    }

    private function getRandomRegistrants($campusTypeId): int
    {
        switch ($campusTypeId) {
            case 1: // PTN
                return rand(80, 100) * 1000;
            case 2: // Politeknik
                return rand(10, 20) * 1000;
            case 3: // Swasta
                return rand(30, 50) * 1000;
            default:
                return rand(10, 100) * 1000;
        }
    }
}
