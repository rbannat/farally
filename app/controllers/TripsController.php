<?php

class TripsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function all()
	{
		$trips = Trip::with('user')->orderBy('created_at', 'DESC')->get();
		return View::make('trips.index', compact('trips'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreateForm()
	{
		return View::make('trips.createForm');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function add()
	{
		 // validate
        // read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'title'       => 'required',
			'destination'       => 'required',
			'description' => 'required',
			'start_date'      => 'required',
			'start-destination'      => 'required'
			);
		$validator = Validator::make(Input::all(), $rules);

        // process the login
		if ($validator->fails()) {
			return Redirect::to('trips/create')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} else {

            // store
			$trip = new Trip;
			$trip->title       = Input::get('title');
			$trip->destination = Input::get('destination');
			$trip->description = Input::get('description');
			$trip->start_date = Input::get('start_date');
			$trip->start_date = Input::get('end_date');
			$trip->start = Input::get('start-destination');
			$trip->max_travellers = Input::get('max_travellers');
			$trip->user_id = Auth::id();
			$trip->transport = serialize(Input::get('transport'));
			$trip->save();

			$trips = Trip::where('user_id', '=', Auth::id())->get();
			return View::make('users.showUserTrips')->with('trips', $trips);
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function one($id)
	{
		$trip = Trip::find($id);
		$participants = $trip->joinedUsers;

		$user_requests = DB::table('trip_requests')
		->where('user_id', '=', Auth::user()->id)
		->where('trip_id', '=', $id)
		->first();


		if (is_null($user_requests)) {
			return View::make('trips.singleTrip')->with('trip', $trip)->with('participants', $participants)->with('is_requested', false);
		} else {
			return View::make('trips.singleTrip')->with('trip', $trip)->with('participants', $participants)->with('is_requested', true);
		}
	}

	/**
	 * Search the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function filter()
	{
		$keyword = Input::get('location-search');
		$startDestination = Input::get('start-destination');
		$startDate = Input::get('start_date');
		$endDate = Input::get('end_date');
		$maxTravellers = Input::get('max_travellers');
		$transport = Input::get('transport');

		$query = DB::table('trips');
		$query->join('users', 'trips.user_id', '=', 'users.id');
		$query->select('trips.id', 'trips.title', 'trips.destination', 'users.username','users.profile_pic','trips.user_id');
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
		if($transport){
			foreach($transport as $value){
				$query->where('transport', 'LIKE', '%'.$value.'%');
			}
		}
		$query->where('user_id', '!=', Auth::id());
		$query->orderBy('trips.created_at', 'desc');
		$trips = $query->get();
		// $trips = Trip::where('destination', 'LIKE', '%'.$keyword.'%')->get();

		return View::make('trips.index', compact('trips'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
