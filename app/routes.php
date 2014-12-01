<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Trip Route
Route::resource('trips', 'TripsController');

/*
Route::get('/', function()
{
	if (Auth::check())
	{
		$this->layout->content = View::make('dashboard');
	} else {
		return View::make('hello');
	}
});*/

Route::get('/register', 'UsersController@register');
Route::get('/login', 'UsersController@getLogin');
Route::post('/login', 'UsersController@login');
Route::get('/logout', 'UsersController@logout');
Route::post('users/add',  array('before' => 'csrf', 'uses' => 'UsersController@add'));

Route::group(['before' => 'auth'], function()
{
	Route::get('/', 'UsersController@index');
	Route::get('users', 'UsersController@all');
});

