<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Form::open(array('url' => 'site1.app/api/deletemovie/{id}', 'method'=>'delete'))

Route::get('/', function () {
    return view('welcome');
});


Route::get('api/getactorinfo/{actorname}', 'ActorController@getActorInfo');
Route::get('api/getmovieinfo/{moviename}', 'MovieController@getMovieInfo');

Route::get('api/addactor/{actorname}', 'ActorController@putActor');
Route::get('api/addmovie/{moviename}/{movieyear}', 'MovieController@putMovie');
Route::get('api/deleteactor/{id}', 'ActorController@deleteActor');
Route::get('api/deletemovie/{id}', 'MovieController@deleteMovie');
