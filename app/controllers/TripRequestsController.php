<?php

class TripRequestsController extends BaseController {


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function add($trip_id)
	{

		 // validate
        // read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'body'       => 'required'
			);
		$validator = Validator::make(Input::all(), $rules);

		$trip = Trip::find($trip_id);
		$participants = $trip->joinedUsers;

		 // process the submit
		if ($validator->fails()) {
			return View::make('trips.singleTrip')
			->with('trip', $trip)
			->with('participants', $participants)
			->with('is_requested', false)
			->withErrors($validator);
		} else {
		// store
			$trip_request = new TripRequest;
			$trip_request->status  = 0;
			$trip_request->user_id = Auth::id();
			$trip_request->trip_id = $trip_id;
			$trip_request->save();


			$user = User::find($trip->user_id);

			$user->newNotification()
			->withType('request')
			->withSubject('users title')
			->withBody(Input::get('body'))
			->withFromUser(Auth::id())
			->regardingRequest($trip_request)
			->regarding($trip)
			->deliver();

			return View::make('trips.singleTrip')->with('trip', $trip)->with('participants', $participants)->with('is_requested', true);
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function update($id)
	{
		$tripRequest = TripRequest::find($id);
		$trip = Trip::find($tripRequest->trip_id);
		$user = User::find($tripRequest->user_id);

		// validate
        // read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'body'       => 'required'
			);
		$validator = Validator::make(Input::all(), $rules);

		 // process the submit
		if ($validator->fails()) {
			return View::make('notifications.index')
			->withErrors($validator);
		} else {

			if ( Input::has('accept') )
			{
				$tripRequest->status = '1';
				$tripRequest->save();
				
				$user->newNotification()
				->withType('accepted')
				->withSubject('users title')
				->withBody(Input::get('body'))
				->withFromUser(Auth::id())
				->regardingRequest($tripRequest)
				->regarding($trip)
				->deliver();

			} elseif ( Input::has('decline') ) {
				$tripRequest->status = '2';
				$tripRequest->save();

				$user->newNotification()
				->withType('declined')
				->withSubject('users title')
				->withBody(Input::get('body'))
				->withFromUser(Auth::id())
				->regardingRequest($tripRequest)
				->regarding($trip)
				->deliver();
			}

	    // redirect
			Session::flash('message', 'Successfully updated status of Request!');
			return View::make('notifications.index');
		}	
			
		}



}