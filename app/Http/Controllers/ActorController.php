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
            $actorInfo = array('error'=>false,'Actor Name'=>$actor->name,'Actor
            ID'=>$actor->id);
            $actormovies = json_decode($actor->Movies);
        foreach ($actormovies as $movie) {
            $movielist[] = array("Movie Name"=>$movie->name, "Release
            Year"=>$movie->release_year);
        }
        $movielist =array('Movies'=>$movielist);
        return Response::json(array_merge($actorInfo,$movielist));
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
                    'description'=>'The actor successfully saved. The ID number of Actor
                    is : '.$the_actor->id
                    ));
        }
        else{
            return Response::json(array(
                    'error'=>true,
                    'description'=>'We have already in database : '.$actorname.'. The ID
                    number of Actor is : '.$actor->id
                  ));
        }
      }

}
