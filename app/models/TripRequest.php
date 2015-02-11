<?php

class TripRequest extends Eloquent {
	protected $fillable = [
	'user_id',
	'trip_id',
	'status'
	];

	public function user(){
		return $this->belongsTo('User');
	}

}