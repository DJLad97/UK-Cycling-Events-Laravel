<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', 'UserController@signup');
Route::post('/login', 'UserController@login');
Route::get('/races', 'RaceController@index');
Route::get('/race/{id}', 'RaceController@getRace');
Route::get('/mtbRaces', 'RaceController@mtbRaces');
Route::get('/upcomingRace/{type}', 'RaceController@getUpcomingRace');
Route::get('/upcomingRaces/{type}', 'RaceController@getUpcomingRaces');

