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

Route::get('/uppercase/{word}', 'HomeController@uppercase');

Route::get('/increment/{num}', 'HomeController@increment');

Route::get('/add/{a}/{b}', 'HomeController@add');

Route::get('/rolldice/{guess?}', 'HomeController@rollDice' );