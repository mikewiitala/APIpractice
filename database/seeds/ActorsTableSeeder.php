<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Actor as Actor;


class ActorsTableSeeder extends Seeder
{
    public function run()
    {
      $faker = Faker::create();

       foreach(range(1,40) as $index) {
         Actor::create([
           'name' => $faker->lastName()
         ]);
       }
    }
}
