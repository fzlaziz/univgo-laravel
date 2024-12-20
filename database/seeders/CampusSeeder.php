<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accreditation = DB::table('accreditations')->where('name', 'Baik Sekali')->first();
        $ptn_id = DB::table('campus_types')->where('name', 'PTN')->value('id');
        $politeknik_id = DB::table('campus_types')->where('name', 'Politeknik')->value('id');
        $swasta_id = DB::table('campus_types')->where('name', 'Swasta')->value('id');

        $unggul_id = DB::table('accreditations')->where('name', 'Unggul')->value('id');
        $baik_sekali_id = DB::table('accreditations')->where('name', 'Baik Sekali')->value('id');
        $a_id = DB::table('accreditations')->where('name', 'A')->value('id');

        if ($accreditation) {
            DB::table('campuses')->insert([
                [
                    'name' => 'Politeknik Negeri Semarang',
                    'description' => 'Kec. Tembalang, Kota Semarang',
                    'date_of_establishment' => '2000-01-01',
                    'logo_path' => '/logo/logo_polines.png',
                    'address_latitude' => (float) -7.051078422420263,
                    'address_longitude' => (float) 110.4355492767185,
                    'web_address' => 'https://www.polines.ac.id',
                    'phone_number' => '021-12345678',
                    'email' => '-',
                    'youtube' => '-',
                    'instagram' => '-',
                    'number_of_graduates' => 1500,
                    'number_of_registrants' => 3000,
                    'min_single_tuition'=> 500000,
                    'max_single_tuition'=> 7500000,
                    'campus_type_id' => $politeknik_id,
                    'accreditation_id' => $a_id,
                    'district_id' => 3181,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Universitas Diponegoro',
                    'description' => 'Kec. Tembalang, Kota Semarang',
                    'date_of_establishment' => '2005-05-05',
                    'logo_path' => '/logo/logo_undip.png',
                    'address_latitude' => (float) -7.0515187389640355,
                    'address_longitude' => (float) 110.4408874135232,
                    'web_address' => 'https://undip.id',
                    'phone_number' => '021-87654321',
                    'email' => '-',
                    'youtube' => '-',
                    'instagram' => '-',
                    'number_of_graduates' => 800,
                    'number_of_registrants' => 1200,
                    'min_single_tuition'=> 500000,
                    'max_single_tuition'=> 22000000,
                    'accreditation_id' => $unggul_id,
                    'campus_type_id' => $ptn_id,
                    'district_id' => 3181,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'name' => 'Universitas Negeri Semarang',
                    'description' => 'Kec. Gunungpati, Kota Semarang',
                    'date_of_establishment' => '1999-09-09',
                    'logo_path' => '/logo/logo_unnes.png',
                    'address_latitude' => (float) -7.050459040075577,
                    'address_longitude' => (float) 110.3924514329852,
                    'web_address' => 'https://unnes.ac.id',
                    'phone_number' => '024-8319000',
                    'email' => '-',
                    'youtube' => '-',
                    'instagram' => '-',
                    'number_of_graduates' => 700,
                    'number_of_registrants' => 1100,
                    'min_single_tuition'=> 500000,
                    'max_single_tuition'=> 22000000,
                    'accreditation_id' => $unggul_id,
                    'campus_type_id' => $ptn_id,
                    'district_id' => 3183,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'name' => 'Universitas Dian Nuswantoro',
                    'description' => 'Kec. Semarang Tengah, Kota Semarang',
                    'date_of_establishment' => '2001-07-07',
                    'logo_path' => '/logo/logo_udinus.png',
                    'address_latitude' => (float) -6.981614114225112,
                    'address_longitude' => (float) 110.40927468580766,
                    'web_address' => 'https://dinus.ac.id',
                    'phone_number' => '024-3517261',
                    'email' => '-',
                    'youtube' => '-',
                    'instagram' => '-',
                    'number_of_graduates' => 650,
                    'number_of_registrants' => 1000,
                    'min_single_tuition'=> 4625000,
                    'max_single_tuition'=> 9250000,
                    'accreditation_id' => $unggul_id,
                    'campus_type_id' => $swasta_id,
                    'district_id' => 3172,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'name' => 'Politeknik Kementrian Kesehatan Semarang',
                    'description' => 'Kec. Banyumanik, Kota Semarang',
                    'date_of_establishment' => '1995-06-06',
                    'logo_path' => '/logo/logo_polkesmar.png',
                    'address_latitude' => (float) -7.054530372005238,
                    'address_longitude' => (float) 110.42843222351858,
                    'web_address' => 'https://poltekkes-smg.ac.id',
                    'phone_number' => '024-74664321',
                    'email' => '-',
                    'youtube' => '-',
                    'instagram' => '-',
                    'number_of_graduates' => 500,
                    'number_of_registrants' => 900,
                    'min_single_tuition'=> 5450000,
                    'max_single_tuition'=> 12850000,
                    'accreditation_id' => $baik_sekali_id,
                    'campus_type_id' => $politeknik_id,
                    'district_id' => 3182,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        } else {
            echo "Akreditasi dengan nama 'Baik Sekali' tidak ditemukan.\n";
        }
    }
}
