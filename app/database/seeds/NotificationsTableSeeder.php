<?php

class NotificationsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('notifications')->delete();

		Notification::create(array(
			'from_user' => 2,
			'user_id' => 1,
			'subject' => 'title',
			'body' => 'text body',
			'trip_id' => 1,
			'type' => 'request',
			'is_read' => 0,
			'trip_request_id' => 1
			));

		Notification::create(array(
			'from_user' => 1,
			'user_id' => 2,
			'subject' => 'title',
			'body' => 'text body',
			'trip_id' => 2,
			'type' => 'request',
			'is_read' => 0,
			'trip_request_id' => 1
			));

		Notification::create(array(
			'from_user' => 1,
			'user_id' => 2,
			'subject' => 'title',
			'body' => 'text body',
			'trip_id' => 1,
			'type' => 'accepted',
			'is_read' => 0,
			'trip_request_id' => 1
			));


		Notification::create(array(
			'from_user' => 1,
			'user_id' => 2,
			'subject' => 'title',
			'body' => 'text body',
			'trip_id' => 2,
			'type' => 'accepted',
			'is_read' => 0,
			'trip_request_id' => 1
			));

	}
}