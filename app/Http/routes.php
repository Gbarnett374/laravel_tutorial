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

// Route::get('articles', 'ArticlesController@index');
// Route::get('articles/create', 'ArticlesController@create');
// //Wild Card Route Must go last, or will be triggered.
// Route::get('articles/{id}', 'ArticlesController@show');
// Route::post('articles','ArticlesController@store');
// Route::get('articles/{id}/edit','ArticlesController@edit');

Route::resource('articles','ArticlesController');

//Routes for Auth. 

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);