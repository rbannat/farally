<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public static $rules = array(
		'username'=>'required|alpha|min:2',
		'forename'=>'required|alpha|min:2',
		'lastname'=>'required|alpha|min:2',
		'email'=>'required|email|unique:users',
		'password'=>'required|alpha_num|min:6|confirmed',
		'password_confirmation'=>'required|alpha_num|min:6'
		);

	public function trips(){
		return $this->hasMany('Trip');
	}

	public function joinedTrips(){
		return $this->belongsToMany('Trip', 'trip_user');
	}

}
