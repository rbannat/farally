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

// Public Routes
Route::get('/register', 'UsersController@getRegisterForm');
Route::get('/login', 'UsersController@getLoginForm');
Route::post('/login', 'UsersController@login');
Route::get('/logout', 'UsersController@logout');
Route::post('users/add',  array('before' => 'csrf', 'uses' => 'UsersController@add'));

// Routes with authentification
Route::group(['before' => 'auth'], function()
{
	// User Routes
	Route::get('/', 'UsersController@dashboard');
	Route::get('users', 'UsersController@all');
	Route::get('users/{user_id}', 'UsersController@one');

	// Trip Routes
	Route::get('trips', 'TripsController@all');
	Route::get('users/{user_id}/trips', 'TripsController@user_trips');
	Route::post('trips/add', 'TripsController@add');
	Route::post('search', 'TripsController@filter');
	Route::get('trips/create', 'TripsController@getCreateForm');
	Route::get('trips/{trip_id}', 'TripsController@one');
});



