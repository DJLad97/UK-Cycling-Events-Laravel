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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/races', 'RacesController@index')->name('races');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/races/{race}', 'RacesController@show');
Route::get('/getCart', 'RacesController@getCart');
Route::get('/mtbRaces', 'RacesController@mtbRaces');
Route::get('/roadRaces', 'RacesController@roadRaces');

Route::post('/raceSearch', 'RacesController@search');
Route::post('/removeCartItem', 'RacesController@removeCartItem');
Route::post('/raceSignUps', 'RaceSignUpsController@store');
Route::get('/sortRaces', 'RacesController@sortRaces');