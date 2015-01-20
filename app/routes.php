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
	Route::get('users/{user_id}', 'UsersController@one');
	Route::get('users/{user_id}/trips', 'TripsController@user_trips');
});

//Search Route
Route::post('/s', function(){
	$keyword = Input::get('location-search');
	$startDestination = Input::get('start-destination');
	$startDate = Input::get('start_date');
	$endDate = Input::get('end_date');
	$maxTravellers = Input::get('max_travellers');

	$query = DB::table('trips');
	$query->join('users', 'trips.user_id', '=', 'users.id');
	if($keyword)
		$query->where('destination', 'LIKE', '%'.$keyword.'%');
	if($startDestination)
		$query->where('start', 'LIKE', '%'.$startDestination.'%');
	if($startDate)
		$query->where('start_date', '>=', $startDate);
	if($endDate)
		$query->where('end_date', '<=', $endDate);
	if($maxTravellers)
		$query->where('max_travellers', '<=', $maxTravellers);

	$searchResults = $query->get();
	// $trips = Trip::where('destination', 'LIKE', '%'.$keyword.'%')->get();

	return View::make('trips.index', compact('searchResults'));
});


