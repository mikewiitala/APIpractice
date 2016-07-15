<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $table = 'actors';
    protected $fillable = ['name'];


    public function Movie() {
      return $this->belongsToMany('Movies', 'pivot_table');
    }
}
