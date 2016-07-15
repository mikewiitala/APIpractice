<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // DB::table('movies')->truncate();
        // DB::table('actors')->truncate();
        $this->call(MovieTableSeeder::class);
        $this->call(ActorsTableSeeder::class);
    }
}
