<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comments = [

            ['news_id' => 1, 'user_id' => 1, 'text' => 'Wih Asik nih'],
            ['news_id' => 1, 'user_id' => 2, 'text' => 'Keren, sehat selalu'],
            ['news_id' => 1, 'user_id' => 1, 'text' => 'Aku mau ikut'],

            ['news_id' => 2, 'user_id' => 2, 'text' => 'Gila, kerennnn'],
            ['news_id' => 2, 'user_id' => 1, 'text' => 'Aku mau masuk polines aja'],
            ['news_id' => 2, 'user_id' => 2, 'text' => 'Kelas King'],

            ['news_id' => 3, 'user_id' => 2, 'text' => 'New Research Center!!!'],
            ['news_id' => 3, 'user_id' => 1, 'text' => 'No way'],
            ['news_id' => 3, 'user_id' => 2, 'text' => 'Kelas Polines'],

            
            ['news_id' => 4, 'user_id' => 1, 'text' => 'Dingin tetapi tetap subuh'],
            ['news_id' => 4, 'user_id' => 2, 'text' => 'GG Undip'],
            ['news_id' => 4, 'user_id' => 1, 'text' => 'Undip gacor'],

            ['news_id' => 5, 'user_id' => 2, 'text' => 'Debat terus'],
            ['news_id' => 5, 'user_id' => 1, 'text' => 'Aku mau jadi ahli debat di Undip'],
            ['news_id' => 5, 'user_id' => 2, 'text' => 'Keren, gg for UNDIP'],

            ['news_id' => 6, 'user_id' => 1, 'text' => 'Undip Opens New Science Building'],
            ['news_id' => 6, 'user_id' => 2, 'text' => 'Amazing development!'],
            ['news_id' => 6, 'user_id' => 1, 'text' => 'Can\'t wait to visit'],

            ['news_id' => 7, 'user_id' => 2, 'text' => 'Undip Collaborates with Industry Leader!!!!!'],
            ['news_id' => 7, 'user_id' => 1, 'text' => 'Great opportunity for students'],
            ['news_id' => 7, 'user_id' => 2, 'text' => 'Exciting times ahead'],
        ];

        DB::table('news_comments')->insert($comments);
    }
}
