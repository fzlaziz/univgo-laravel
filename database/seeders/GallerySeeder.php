<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $polines_id = 1;
        $undip_id = 4;
        $pip = 46;
        $udinus = 7;
        $unnes = 6;
        $usm = 55;
        $poltekkes = 27;
        $unika = 28;

        DB::table('galleries')->insert([
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/polines1.jpg', 'campus_id' => $polines_id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/polines2.png', 'campus_id' => $polines_id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/polines3.jpg', 'campus_id' => $polines_id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/polines4.png', 'campus_id' => $polines_id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/polines5.png', 'campus_id' => $polines_id, 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('galleries')->insert([
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/pip1.jpg', 'campus_id' => $pip, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/pip2.jpg', 'campus_id' => $pip, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/pip3.jpg', 'campus_id' => $pip, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/pip4.jpg', 'campus_id' => $pip, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/pip5.jpg', 'campus_id' => $pip, 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('galleries')->insert([
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/poltekkes1.jpg', 'campus_id' => $poltekkes, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/poltekkes2.jpg', 'campus_id' => $poltekkes, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/poltekkes3.jpg', 'campus_id' => $poltekkes, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/poltekkes4.jpg', 'campus_id' => $poltekkes, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/poltekkes5.jpg', 'campus_id' => $poltekkes, 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('galleries')->insert([
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/undip1.jpg', 'campus_id' => $undip_id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/undip2.jpg', 'campus_id' => $undip_id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/undip3.jpg', 'campus_id' => $undip_id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/undip4.jpg', 'campus_id' => $undip_id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/undip5.jpg', 'campus_id' => $undip_id, 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('galleries')->insert([
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/udinus1.jpg', 'campus_id' => $udinus, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/udinus2.jpg', 'campus_id' => $udinus, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/udinus3.jpg', 'campus_id' => $udinus, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/udinus4.png', 'campus_id' => $udinus, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/udinus5.jpg', 'campus_id' => $udinus, 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('galleries')->insert([
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/unika1.png', 'campus_id' => $unika, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/unika2.jpg', 'campus_id' => $unika, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/unika3.jpg', 'campus_id' => $unika, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/unika4.jpg', 'campus_id' => $unika, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/unika5.jpg', 'campus_id' => $unika, 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('galleries')->insert([
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/unnes1.jpg', 'campus_id' => $unnes, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/unnes2.jpeg', 'campus_id' => $unnes, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/unnes3.jpg', 'campus_id' => $unnes, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/unnes4.jpg', 'campus_id' => $unnes, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/unnes5.jpg', 'campus_id' => $unnes, 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('galleries')->insert([
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/usm1.jpg', 'campus_id' => $usm, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/usm2.jpg', 'campus_id' => $usm, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/usm3.jpg', 'campus_id' => $usm, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/usm4.jpg', 'campus_id' => $usm, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'galeri', 'description' => 'galeri', 'file_location' => 'campus-galleries/usm5.jpg', 'campus_id' => $usm, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
