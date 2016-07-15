<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie as Movie;
use App\Http\Requests;
use Response;

class MovieController extends Controller
{
    public function getMovieInfo($moviename) {
      $movie = Movie::where('name', 'like', '%'.$moviename.'%')->first();
      'Release Year'=>$movie->year,'Movie ID'=>$movie->id);
      $movieactors = json_decode($movie->Actors);

      foreach ($movieactors as $actor) {
      $actorlist[] = array("Actor"=>$actor->name);
      }
      $actorlist =array('Actors'=>$actorlist);
      return Response::json(array_merge($movieInfo,$actorlist));
    }
    else{
      return Response::json(array(
        'error'=>true,
        'description'=>'We could not find any movie in database like:'.$moviename
      ));
    }

    public function putMovie($moviename,$movieyear) {
      $movie = Movie::where('name', '=', $moviename)->first();
      if(!$movie){
        $the_movie = Movie::create(array('name'=>$moviename,'release_
        year'=>$movieyear));
        return Response::json(array(
          'error'=>false,
          'description'=>'The movie successfully saved. The ID number of Movie
          is : '.$the_movie->id
        ));
      }
      else{
        return Response::json(array(
          'error'=>true,
          'description'=>'We have already in database : '.$moviename.'. The ID
          number of Movie is : '.$movie->id
        ));
      }
    }
}
