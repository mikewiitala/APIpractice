<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use App\Movie as Movie;
use Faker\Factory as Faker;

class MovieTableSeeder extends Seeder
{


    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $faker = Faker::create();

        foreach(range(1,30) as $index) {
          Movie::create([
            'name' => $faker->firstName(),
            'year' => $faker->year()
          ]);
        }
    }
}
