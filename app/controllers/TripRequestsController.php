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
		    ->withSubject('my title')
		    ->withBody('<User X> has requested to join your trip!')
		    ->withFromUser(Auth::id())
		    ->regarding($trip)
		    ->deliver();

		return View::make('trips.singleTrip')->with('trip', $trip)->with('participants', $participants)->with('is_requested', true);
	}


}