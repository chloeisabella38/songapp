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

Route::auth();

Route::get('/posts', 'PostsController@index');
Route::get('/postsedit/{id}', 'PostsController@edit');
Route::post('/postsupdate/{id}', 'PostsController@update');
Route::get('/postsdelete/{id}', 'PostsController@destroy');
Route::post('/postsstore', 'PostsController@store');

Route::get('/postsshow/{id}', 'PostsController@show');


Route::get('/home', 'HomeController@index');

