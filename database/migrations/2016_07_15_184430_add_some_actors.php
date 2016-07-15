<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Actor;

class AddSomeActors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       $woody = Actor::create(['name' => 'Woody',]);
       $woody->Movies()->attach([1,2]);

       $diane = Actor::create(['name' => 'Diane']);
       $diane->Movies()->attach([3,4]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
