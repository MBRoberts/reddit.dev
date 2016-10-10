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

Route::get('/uppercase/{word}', function ($word) {
	return strtoupper($word);
});

Route::get('/increment/{num}', function ($num) {
	return $num + 1;
});

Route::get('/add/{a}/{b}', function ($a, $b) {
	return $a + $b;
});

Route::get('/rolldice/{guess?}', function ($guess = 0) {
	
	$data['dice'] = rand(1,6);
	$data['guess'] = $guess;

	if($guess == $data['dice']) {
		$data['result'] = 'Good Guess';
	} else {
		$data['result'] = 'Wrong';
	}

	return view('roll-dice')->with($data);

});