<?php

class TripRequestsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('trip_requests')->delete();

		TripRequest::create(array(
			'trip_id' => '1',
			'status' => 0,
			'user_id' => '2'
			));

		TripRequest::create(array(
			'trip_id' => '2',
			'status' => 1,
			'user_id' => '2'
			));

		TripRequest::create(array(
			'trip_id' => '3',
			'status' => 2,
			'user_id' => '2'
			));

		TripRequest::create(array(
			'trip_id' => '1',
			'status' => 0,
			'user_id' => '1'
			));

		TripRequest::create(array(
			'trip_id' => '2',
			'status' => 1,
			'user_id' => '1'
			));

		TripRequest::create(array(
			'trip_id' => '3',
			'status' => 2,
			'user_id' => '1'
			));
	}
}