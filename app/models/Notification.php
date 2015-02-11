<?php

class Notification extends Eloquent {

	protected $fillable   = ['user_id','from_user', 'type', 'subject', 'body', 'trip_id', 'sent_at'];

	public function getDates()
	{
		return ['created_at', 'updated_at', 'sent_at'];
	}

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function tripRequest()
	{
		return $this->belongsTo('TripRequest', 'trip_request_id');
	}

	public function fromUser()
	{
		return $this->belongsTo('User', 'from_user');
	}

	public function regardingTrip()
	{
		return $this->belongsTo('Trip', 'trip_id');
	}


	//Setter Methods
	public function withSubject($subject)
	{
		$this->subject = $subject;

		return $this;
	}

	public function withBody($body)
	{
		$this->body = $body;

		return $this;
	}

	public function withType($type)
	{
		$this->type = $type;

		return $this;
	}

	public function withFromUser($fromUser)
	{
		$this->from_user = $fromUser;

		return $this;
	}

	public function regarding($trip)
	{
		if(is_object($trip))
		{
			$this->trip_id   = $trip->id;
		}

		return $this;
	}

	public function deliver()
	{
		$this->sent_at = new Carbon;
		$this->save();

		return $this;
	}

	public function scopeUnread($query)
	{
		return $query->where('is_read', '=', 0)->where('user_id', '=', Auth::id());
	}
}