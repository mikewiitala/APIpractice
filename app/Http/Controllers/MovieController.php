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

      if($movie){
        $movieInfo = array('error'=>false,'Movie Name'=>$movie->name,'Release Year'=>$movie->year,
        'Movie ID'=>$movie->id);
        $movieactors = json_decode($movie->Actors);

        //If movie has attached actors
        if ($movieactors){
            foreach ($movieactors as $actor) {
              $actorlist[] = array("Actor"=>$actor->name);
            }
            $actorlist =array('Actors'=>$actorlist);
            return Response::json(array_merge($movieInfo,$actorlist));
        }else {
          return Response::json($movieInfo);
        }
     }
     else{
        return Response::json(array(
          'error'=>true,
          'description'=>'We could not find any movie in database like:'.$moviename
      ));
    }
  }

    public function putMovie($moviename,$movieyear) {
      $movie = Movie::where('name', '=', $moviename)->first();
      if(!$movie){
        $the_movie = Movie::create(array('name'=>$moviename,
        'year'=>$movieyear));
        return Response::json(array(
          'error'=>false,
          'description'=>'The movie successfully saved. The ID number of Movie is : '
          .$the_movie->id
        ));
      }
      else{
        return Response::json(array(
          'error'=>true,
          'description'=>$moviename.' is already in database. The ID number of Movie is: '
          .$movie->id
        ));
      }
    }

    public function deleteMovie($id) {

      $kill = Movie::where('id', '=', $id)->first();
      if(!$kill) {
        return Response::json(['error'=>true, 'description'=>'No movie of the id '.$id.' in database']);
      }else {
        $moviename = $kill->name;
        $kill->delete();
        return Response::json(['error'=>false, 'description'=>$moviename.' was removed from database']);
      }
    }
}
