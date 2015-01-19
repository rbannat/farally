<?php

class Trip extends Eloquent {
	protected $fillable = [
		'title',
		'description',
		'user_id',
		'start_date',
		'end_date',
		'destination',
		'start',
		'max_travellers'
	];

	public function user(){
		return $this->belongsTo('User');
	}
}