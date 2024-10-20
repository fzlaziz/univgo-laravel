<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CampusSeeder;
use Database\Seeders\FacultySeeder;
use Database\Seeders\DegreeLevelSeeder;
use Database\Seeders\StudyProgramSeeder;
use Database\Seeders\AccreditationSeeder;
use Database\Seeders\MasterFacultySeeder;
use Laravolt\Indonesia\Seeds\CitiesSeeder;
use Laravolt\Indonesia\Seeds\VillagesSeeder;
use Database\Seeders\CampusDegreeLevelSeeder;
use Laravolt\Indonesia\Seeds\DistrictsSeeder;
use Laravolt\Indonesia\Seeds\ProvincesSeeder;
use Database\Seeders\MasterStudyProgramSeeder;

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
        $this->call([
            ProvincesSeeder::class,
            CitiesSeeder::class,
            DistrictsSeeder::class,
            VillagesSeeder::class,
        ]);
    }
}
