<?php

namespace App\Http\Controllers;
use App\Actor as Actor;
use Illuminate\Http\Request;
use Response;

use App\Http\Requests;

class ActorController extends Controller
{
    public function getActorInfo($actorname){
        $actor = Actor::where('name', 'like', '%'.$actorname.'%')->first();
        if($actor){
            $actorInfo = array('error'=>false,'Actor Name'=>$actor->name,'Actor ID'=>$actor->id);
            $actormovies = json_decode($actor->Movies);
        if($actormovies) {
        foreach ($actormovies as $movie) {
            $movielist[] = array("Movie Name"=>$movie->name, "Release Year"=>$movie->year);
        }
        $movielist =array('Movies'=>$movielist);
        return Response::json(array_merge($actorInfo,$movielist));
        }else {
            return Response::json($actorInfo);
        }
    }
    else{
        return Response::json(array(
        'error'=>true,
        'description'=>'We could not find any actor in database like:'.$actorname
        ));
      }
    }

    public function putActor($actorname) {
        $actor = Actor::where('name', '=', $actorname)->first();
        if(!$actor){
            $the_actor = Actor::create(array('name'=>$actorname));
            return Response::json(array(
                    'error'=>false,
                    'description'=>'The actor successfully saved. The ID number of Actor is: '
                    .$the_actor->id
                    ));
        }
        else{
            return Response::json(array(
                    'error'=>true,
                    'description'=>$actorname.' is already in the database. The ID number of Actor is: '
                    .$actor->id
                  ));
        }
      }

      public function deleteActor($id) {

        $kill = Actor::where('id', '=', $id)->first();
        if(!$kill) {
          return Response::json(['error'=>true, 'description'=>'No actor of the id '.$id.' in database']);
        }else {
          $actorname = $kill->name;
          $kill->delete();
          return Response::json(['error'=>false, 'description'=>$actorname.' was removed from database']);
        }
      }

}
