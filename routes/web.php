<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/test', function(){
    return view('test');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/races', 'RacesController@index')->name('races');
Route::get('/races/{race}', 'RacesController@show');

Route::post('/raceSearch', 'RacesController@search');
Route::post('/raceSignUps', 'RaceSignUpsController@store');
