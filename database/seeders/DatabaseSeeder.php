<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(MasterFacultySeeder::class);
        $this->call(MasterStudyProgramSeeder::class);
        $this->call(FacultySeeder::class);

        $this->call(AccreditationSeeder::class);
        $this->call(DegreeLevelSeeder::class);

        $this->call(CampusSeeder::class);
        $this->call(CampusDegreeLevelSeeder::class);
        
        $this->call(StudyProgramSeeder::class);
    }
}
