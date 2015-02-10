<?php

class NotificationsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function all()
	{

		DB::table('notifications')
		->where('user_id', Auth::id())
		->update(array('is_read' => 1));
		
		return View::make('notifications.index');
	}



}
