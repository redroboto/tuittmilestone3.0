<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Faker\Factor as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
        DB::table('users')->insert(['name' => $faker->firstName,
        	'location' => $faker->lastName,
        	'password'=> 
        	 ])
    }
}
