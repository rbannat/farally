<?php

class TripsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$trips = Trip::with('user')->get();
		return View::make('trips.index', compact('trips'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('trips.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
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
			$trip->start = Input::get('start-destination');
			$trip->max_travellers = Input::get('max_travellers');
			$trip->user_id = Auth::id();
			$trip->save();

            // redirect
			return Redirect::to('trips');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{		
		$trip = Trip::find($id);

		return View::make('trips.show')->with('trip', $trip);
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
