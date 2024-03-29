<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
  protected $table = 'movies';
  protected $fillable = ['name', 'year'];

  public function Actors() {
    return $this->belongsToMany('App\Actor', 'actor_movie');
  }
}
