<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NewsCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $comments = [
            ['news_id' => 1, 'user_id' => 1, 'text' => 'Wih Asik nih', 'created_at' => $now],
            ['news_id' => 1, 'user_id' => 2, 'text' => 'Keren, sehat selalu', 'created_at' => $now->copy()->addMinutes(5)],
            ['news_id' => 1, 'user_id' => 1, 'text' => 'Aku mau ikut', 'created_at' => $now->copy()->addMinutes(10)],

            ['news_id' => 2, 'user_id' => 2, 'text' => 'Gila, kerennnn', 'created_at' => $now->copy()->addMinutes(15)],
            ['news_id' => 2, 'user_id' => 1, 'text' => 'Aku mau masuk polines aja', 'created_at' => $now->copy()->addMinutes(20)],
            ['news_id' => 2, 'user_id' => 2, 'text' => 'Kelas King', 'created_at' => $now->copy()->addMinutes(25)],

            ['news_id' => 3, 'user_id' => 2, 'text' => 'New Research Center!!!', 'created_at' => $now->copy()->addMinutes(30)],
            ['news_id' => 3, 'user_id' => 1, 'text' => 'No way', 'created_at' => $now->copy()->addMinutes(35)],
            ['news_id' => 3, 'user_id' => 2, 'text' => 'Kelas Polines', 'created_at' => $now->copy()->addMinutes(40)],

            ['news_id' => 4, 'user_id' => 1, 'text' => 'Dingin tetapi tetap subuh', 'created_at' => $now->copy()->addMinutes(45)],
            ['news_id' => 4, 'user_id' => 2, 'text' => 'GG Undip', 'created_at' => $now->copy()->addMinutes(50)],
            ['news_id' => 4, 'user_id' => 1, 'text' => 'Undip gacor', 'created_at' => $now->copy()->addMinutes(55)],

            ['news_id' => 5, 'user_id' => 2, 'text' => 'Debat terus', 'created_at' => $now->copy()->addMinutes(60)],
            ['news_id' => 5, 'user_id' => 1, 'text' => 'Aku mau jadi ahli debat di Undip', 'created_at' => $now->copy()->addMinutes(65)],
            ['news_id' => 5, 'user_id' => 2, 'text' => 'Keren, gg for UNDIP', 'created_at' => $now->copy()->addMinutes(70)],

            ['news_id' => 6, 'user_id' => 1, 'text' => 'Undip Opens New Science Building', 'created_at' => $now->copy()->addMinutes(75)],
            ['news_id' => 6, 'user_id' => 2, 'text' => 'Amazing development!', 'created_at' => $now->copy()->addMinutes(80)],
            ['news_id' => 6, 'user_id' => 1, 'text' => 'Can\'t wait to visit', 'created_at' => $now->copy()->addMinutes(85)],

            ['news_id' => 7, 'user_id' => 2, 'text' => 'Undip Collaborates with Industry Leader!!!!!', 'created_at' => $now->copy()->addMinutes(90)],
            ['news_id' => 7, 'user_id' => 1, 'text' => 'Great opportunity for students', 'created_at' => $now->copy()->addMinutes(95)],
            ['news_id' => 7, 'user_id' => 2, 'text' => 'Exciting times ahead', 'created_at' => $now->copy()->addMinutes(100)],
        ];

        DB::table('news_comments')->insert($comments);
    }
}

