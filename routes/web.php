<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'RiderController@create');

Auth::routes(['register' => false,'reset' => false]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'RiderController@create')->name('home');
    Route::resource('/riders', 'RiderController');

    Route::resource('/races','RaceController');

    Route::get('/raceResults/{race}', 'RaceResultsController@create')->name('results.create');
    Route::post('/updateResults', 'RaceResultsController@store')->name('results.store');

    Route::get('logout', 'LoginController@logout');
});
