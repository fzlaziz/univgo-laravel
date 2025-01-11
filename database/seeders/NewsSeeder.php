<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $campusPolines = DB::table('campuses')->where('id', 1)->first();
        $campusUndip = DB::table('campuses')->where('id', 4)->first();

        if ($campusPolines) {
            DB::table('news')->insert([
            [
                'campus_id' => $campusPolines->id,
                'title' => "New Campus Event at Polines",
                'slug' => "new-campus-event-at-polines",
                'excerpt' => "Join us for a day filled with insightful sessions, networking opportunities, and much more at Polines.",
                'content' => "We are excited to announce a new event happening at Polines. Join us for a day filled with insightful sessions, networking opportunities, and much more. Don't miss out on this chance to be a part of something special!",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'campus_id' => $campusPolines->id,
                'title' => "Polines Menjuarai Olimpiade Vokasi",
                'slug' => "polines-menjuarai-olimpiade-vokasi",
                'excerpt' => "Polines berhasil menjuarai Olimpiade Vokasi pada bidang cyber dengan meraih juara 1 pada tahun 2023.",
                'content' => "Polines Menjuarai Olimpiade Vokasi pada bidang cyber dengan juara 1 pada tahun 2023. Prestasi ini merupakan hasil kerja keras dan dedikasi dari seluruh tim yang terlibat. Kami berharap pencapaian ini dapat menjadi inspirasi bagi mahasiswa lainnya untuk terus berprestasi dan mengharumkan nama Polines.",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'campus_id' => $campusPolines->id,
                'title' => "Polines Launches New Research Center",
                'slug' => "polines-launches-new-research-center",
                'excerpt' => "Polines has launched a new research center focused on renewable energy.",
                'content' => "Polines is proud to announce the launch of its new research center dedicated to renewable energy. The center aims to foster innovation and research in sustainable energy solutions. This initiative is part of Polines' commitment to advancing technology and promoting environmental sustainability.",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            ]);
        } else {
            echo "Salah satu atau lebih data untuk Polines tidak ditemukan.\n";
        }

        if ($campusUndip) {
            DB::table('news')->insert([
            [
                'campus_id' => $campusUndip->id,
                'title' => "Undip Hosts International Conference",
                'slug' => "undip-hosts-international-conference",
                'excerpt' => "Undip is hosting an international conference on sustainable development.",
                'content' => "Undip is proud to host an international conference on sustainable development. Experts from around the world will gather to discuss the latest research and strategies for promoting sustainability. Don't miss this opportunity to learn and network with leaders in the field.",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'campus_id' => $campusUndip->id,
                'title' => "Undip Wins National Debate Competition",
                'slug' => "undip-wins-national-debate-competition",
                'excerpt' => "Undip's debate team has won the national debate competition for the second consecutive year.",
                'content' => "Undip's debate team has once again proven their excellence by winning the national debate competition for the second consecutive year. This achievement is a testament to their hard work, dedication, and exceptional skills. Congratulations to the team and their coaches!",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'campus_id' => $campusUndip->id,
                'title' => "Undip Opens New Science Building",
                'slug' => "undip-opens-new-science-building",
                'excerpt' => "Undip has opened a new state-of-the-art science building to enhance research and education.",
                'content' => "Undip is excited to announce the opening of its new state-of-the-art science building. This facility is equipped with the latest technology and resources to support cutting-edge research and provide an enhanced learning environment for students. The new building is a significant milestone in Undip's commitment to academic excellence.",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'campus_id' => $campusUndip->id,
                'title' => "Undip Collaborates with Industry Leaders",
                'slug' => "undip-collaborates-with-industry-leaders",
                'excerpt' => "Undip has entered into a collaboration with leading industry partners to advance research and innovation.",
                'content' => "Undip is proud to announce a new collaboration with leading industry partners aimed at advancing research and innovation. This partnership will provide students and faculty with unique opportunities to work on real-world projects, gain valuable insights, and contribute to groundbreaking developments in various fields. This initiative underscores Undip's commitment to fostering strong industry-academia relationships.",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            ]);
        } else {
            echo "Salah satu atau lebih data untuk Undip tidak ditemukan.\n";
        }
    }
}
