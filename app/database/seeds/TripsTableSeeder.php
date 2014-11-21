<?php

class TripsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('trips')->delete();

		Trip::create(array(
			'title' => 'Trip to London',
			'destination' => 'London',
			'start' => 'Berlin',
			'max_travellers' => '10',
			'description' => 'I wanna go to london',
			'start_date' => '2015-02-02',
			'end_date' => '2015-02-08',
			'user_id' => '1',
			));

	}
}