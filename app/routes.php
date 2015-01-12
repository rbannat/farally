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

//User Routes
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

//Search Route
Route::post('/s', function(){
	$keyword = Input::get('location-search');

	$trips = Trip::where('destination', 'LIKE', '%'.explode(',',$keyword)[0].'%')->get();

	return View::make('trips.index', compact('trips'));
});


