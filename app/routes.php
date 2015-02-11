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
	Route::get('users/{user_id}', array('uses'=>'UsersController@one','as' => 'users.one'));
	Route::get('users/{user_id}/edit', 'UsersController@edit');
	Route::put('users/{user_id}', array('uses'=>'UsersController@update','as' => 'users.update'));
	Route::get('users/{user_id}/trips', array('uses' => 'UsersController@user_trips', 'as' => 'users.user_trips'));

	// Trip Routes
	Route::get('trips', 'TripsController@all');
	Route::post('trips/add', 'TripsController@add');
	Route::post('search', 'TripsController@filter');
	Route::get('trips/create', 'TripsController@getCreateForm');
	Route::get('trips/{trip_id}', array('uses' => 'TripsController@one', 'as' => 'trips.one'));

	// Request Routes
	Route::post('trips/{trip_id}', 'TripRequestsController@add');
	Route::put('requests/{trip_request_id}', array('uses'=>'TripRequestsController@update','as' => 'tripRequests.update'));

	// Notification Route
	Route::get('notifications', array('uses' => 'NotificationsController@all', 'as' => 'notifications.all'));
});

View::Composer('partials.notifications', function($view)
{
	$user= Auth::user();
	$notifications = $user->notifications()->unread()->get();
	$view->with('notifications', $notifications);
});

View::Composer('partials.notificationlist', function($view)
{
	$user= Auth::user();
	$notifications = $user->notifications()->orderBy('created_at','desc')->get();
	$view->with('notifications', $notifications);
});



