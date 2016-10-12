<?php

use App\Models\Post;

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

Route::resource('posts','PostsController');

Route::get('orm-test', function()
{
	$post1 = new Post();
	$post1->created_by = 1;
	$post1->title = 'title';
	$post1->url = 'url';
	$post1->content = 'some content stuff';
	$post1->save();

	$post2 = new Post();
	$post2->created_by = 1;
	$post2->title = 'title';
	$post2->url = 'url';
	$post2->content = 'some content stuff';
	$post2->save();
});