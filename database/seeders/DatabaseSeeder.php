<?php

namespace Database\Seeders;

use App\Models\CampusRanking;
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
use Database\Seeders\CampusRankingSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create(['name' => 'Abimanyu']);
        User::factory()->create(['name' => 'Pratama']);
        $this->call([
            ProvincesSeeder::class,
            CitiesSeeder::class,
            DistrictsSeeder::class,
            VillagesSeeder::class,
        ]);
        $this->call(MasterFacultySeeder::class);
        $this->call(MasterStudyProgramSeeder::class);

        $this->call(AccreditationSeeder::class);
        $this->call(DegreeLevelSeeder::class);
        $this->call(CampusTypeSeeder::class);

        $this->call(CampusSeeder::class);
        $this->call(FacultySeeder::class);
        $this->call(CampusDegreeLevelSeeder::class);
        $this->call(AdmissionRouteSeeder::class);
        $this->call(AdmissionRouteCampusSeeder::class);

        $this->call(NewsSeeder::class);
        $this->call(NewsCommentSeeder::class);
        $this->call(StudyProgramSeeder::class);
        $this->call(CampusRankingSeeder::class);
        $this->call(CampusRegistrationRecordSeeder::class);

        $this->call(FacilitySeeder::class);
        $this->call(GallerySeeder::class);
    }
}
