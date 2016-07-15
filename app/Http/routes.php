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

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('movies', 'MovieController@getMovieInfo');
// Route::resource('actors', 'ActorController@getActorInfo');
Route::get('api/getactorinfo/{actorname}', 'ActorController@getActorInfo');
Route::get('api/getactorinfo/{moviename}', 'MovieController@getMovieInfo');

Route::put('api/addactor/{actorname}', 'ActorController@putActor');
Route::put('api/addmovie/{moviename}/{movieyear}', 'MovieController@putMovie');
Route::delete('api/deleteactor/{id}', 'ActorController@deleteActor');
Route::delete('api/deletemovie/{id}', 'MovieController@deleteMovie');
