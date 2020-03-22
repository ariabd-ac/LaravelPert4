<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Faker\Provider\pt_BR\PhoneNumber;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 50; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('teachers')->insert([
    			'nama' => $faker->name,
    			'nig' => $faker->numberBetween(17090, 18090),
                'ttl' => $faker->randomElement($array = array ('Slawi 27 Agustus 1988', 'Slawi 27 Agustus 1985','Slawi 27 Agustus 1983')),
                'no_tlp' => $faker->randomNumber($nbDigits = NULL, $strict = false),
                'jabatan' => $faker->randomElement($array = array ('Sekretaris', 'Kabid. Humas','Anggota')),
                'mp' => $faker->randomElement($array = array ('Matematika', 'IPS','IPA','Seni Budaya','Sejarah','Bahasa Indonesia','Bahasa Inggris','Kimia','Fisika')),
    			'status' => $faker->randomElement($array = array ('Honorer', 'PNS',))
    		]);
 
    	}
    }
}
