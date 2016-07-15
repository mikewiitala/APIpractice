<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $table = 'actors';
    protected $fillable = ['name'];


    public function Movies() {
      return $this->belongsToMany('App\Movie', 'actor_movie');
    }
}
