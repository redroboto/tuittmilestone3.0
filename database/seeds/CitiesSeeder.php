<?php

use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = array(
        'Caloocan', 'Las Piñas', 'Makati', 'Malabon', 'Mandaluyong',
        'Manila', 'Marikina', 'Muntinlupa', 'Navotas', 'Parañaque', 'Pasay',
        'Pasig', 'Quezon City', 'San Juan', 'Taguig', 'Valenzuela',
        'Butuan', 'Cabadbaran', 'Bayugan', 'Legazpi', 'Ligao', 'Tabaco',
        'Isabela', 'Lamitan', 'Balanga', 'Batangas City', 'Lipa', 'Tanauan',
        'Baguio', 'Tagbilaran', 'Malaybalay', 'Valencia', 'Malolos',
        'Meycauayan', 'San Jose del Monte', 'Tuguegarao', 'Iriga', 'Naga',
        'Roxas', 'Bacoor', 'Cavite City', 'Dasmariñas', 'Imus', 'Tagaytay',
        'Trece Martires', 'Bogo', 'Carcar', 'Cebu City', 'Danao', 'Lapu-Lapu',
        'Mandaue', 'Naga', 'Talisay', 'Toledo', 'Kidapawan', 'Panabo', 'Samal',
        'Tagum', 'Davao City', 'Digos', 'Mati', 'Borongan', 'Batac', 'Laoag',
        'Candon', 'Vigan', 'Iloilo City', 'Passi', 'Cauayan', 'Ilagan',
        'Santiago', 'Tabuk', 'San Fernando', 'Biñan', 'Cabuyao', 'Calamba',
        'San Pablo', 'Santa Rosa', 'San Pedro', 'Iligan', 'Marawi', 'Baybay',
        'Ormoc', 'Tacloban', 'Cotabato City', 'Masbate City', 'Oroquieta',
        'Ozamiz', 'Tangub', 'Cagayan de Oro', 'El Salvador', 'Gingoog',
        'Bacolod', 'Bago', 'Cadiz', 'Escalante', 'Himamaylan', 'Kabankalan',
        'La Carlota', 'Sagay', 'San Carlos', 'Silay', 'Sipalay', 'Talisay',
        'Victorias', 'Bais', 'Bayawan', 'Canlaon', 'Dumaguete', 'Guihulngan',
        'Tanjay', 'Cabanatuan', 'Gapan', 'Muñoz', 'Palayan', 'San Jose',
        'Calapan', 'Puerto Princesa', 'Angeles', 'Mabalacat',
        'San Fernando', 'Alaminos', 'Dagupan', 'San Carlos',
        'Urdaneta', 'Lucena', 'Tayabas', 'Antipolo','Calbayog', 'Catbalogan',
        'Sorsogon City', 'General Santos', 'Koronadal', 'Maasin', 'Tacurong',
        'Surigao City', 'Bislig', 'Tandag', 'Tarlac City','Olongapo',
        'Dapitan', 'Dipolog', 'Pagadian', 'Zamboanga City'
    );

        $faker = Faker::create();

        foreach ($cities as $city) {
			DB::table('cities')->insert([
			'city' => $city
        	 ]);
        }

    }


}
