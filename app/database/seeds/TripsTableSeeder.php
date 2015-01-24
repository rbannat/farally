<?php

class TripsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('trips')->delete();

		Trip::create(array(
			'title' => 'Trip to London',
			'destination' => 'London, United Kingdom',
			'start' => 'Berlin, Germany',
			'max_travellers' => '10',
			'description' => 'I wanna go to london',
			'start_date' => '2015-02-02',
			'end_date' => '2015-02-08',
			'user_id' => '1',
			'transport' => serialize(["car", "plane", "train"])
			));

		Trip::create(array(
			'title' => 'Trip to Paris',
			'destination' => 'Paris, France',
			'start' => 'London, United Kingdom',
			'max_travellers' => '2',
			'description' => 'I wanna go to paris',
			'start_date' => '2015-02-15',
			'end_date' => '2015-02-30',
			'user_id' => '2',
			'transport' => serialize(["car", "plane", "train"])
			));

		Trip::create(array(
			'title' => 'Trip to Munich',
			'destination' => 'Munich, Germany',
			'start' => 'Berlin, Germany',
			'max_travellers' => '5',
			'description' => 'I wanna go to munich',
			'start_date' => '2015-02-01',
			'end_date' => '2015-02-07',
			'user_id' => '2',
			'transport' => serialize(["car", "plane", "train"])
			));

	}
}