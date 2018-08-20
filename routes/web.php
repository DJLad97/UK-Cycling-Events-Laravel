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


// Auth::routes();

Route::get('{path}', function () {
    return view('home');
})->where('path', '([A-z\d-\/_.]+)?');

// Route::post('/api/login', 'UserController@login');


// Route::get('/', 'HomeController@index')->name('home');
// Route::get('/races', 'RaceController@index')->name('races');
// Route::get('/profile', 'ProfileController@index')->name('profile');
// Route::get('/races/{race}', 'RaceController@show');
// Route::get('/getCart', 'RaceController@getCart');
// Route::get('/mtbRaces', 'RaceController@mtbRaces');
// Route::get('/roadRaces', 'RaceController@roadRaces');

// Route::post('/raceSearch', 'RaceController@search');
// Route::post('/removeCartItem', 'RaceController@removeCartItem');
// Route::post('/raceSignUps', 'RaceSignUpsController@store');
// Route::get('/sortRaces', 'RaceController@sortRaces');