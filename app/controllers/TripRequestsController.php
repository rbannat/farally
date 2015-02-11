<?php

class TripRequestsController extends BaseController {


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function add($trip_id)
	{
		// store
		$trip_request = new TripRequest;
		$trip_request->status  = 0;
		$trip_request->user_id = Auth::id();
		$trip_request->trip_id = $trip_id;
		$trip_request->save();

		$trip = Trip::find($trip_id);
		$participants = $trip->joinedUsers;

		$user = User::find($trip->user_id);

		$user->newNotification()
		->withType('request')
		->withSubject('users title')
		->withBody('users content')
		->withFromUser(Auth::id())
		->regarding($trip)
		->deliver();

		return View::make('trips.singleTrip')->with('trip', $trip)->with('participants', $participants)->with('is_requested', true);
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

		$user = User::find($trip->user_id);

		if ( Input::has('accept') )
		{
			$tripRequest->status = '1';

			$user->newNotification()
			->withType('accepted')
			->withSubject('users title')
			->withBody('users content')
			->withFromUser(Auth::id())
			->regarding($trip)
			->deliver();

		} elseif ( Input::has('decline') ) {
			$tripRequest->status = '2';

			$user->newNotification()
			->withType('declined')
			->withSubject('users title')
			->withBody('users content')
			->withFromUser(Auth::id())
			->regarding($trip)
			->deliver();
		}

		$tripRequest->save();

	    // redirect
		Session::flash('message', 'Successfully updated status of Request!');
		return View::make('notifications.index');
	}	


}