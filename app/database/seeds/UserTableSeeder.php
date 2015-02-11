<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

		User::create(array(
			'username' => 'stefanschwartze',
			'password' => Hash::make('stefan'),
			'forename' => 'Stefan',
			'lastname' => 'Schwartze',
			'email' => 'hello@stefanschwartze.com',
			'birthdate' => '1992-06-10',
			'gender' => 'male',
			'about' => 'Hi. I am Stefan. I like to troll around in the web',
			'profile_pic' => '',
			));

		User::create(array(
			'username' => 'rennitlb',
			'password' => Hash::make('rene'),
			'forename' => 'Rene',
			'lastname' => 'Bannat',
			'email' => 'rennitlb@gmail.com',
			'birthdate' => '1990-01-01',
			'gender' => 'male',
			'about' => 'Ich mag Toastbrot.',
			'profile_pic' => '',
			));	

		User::create(array(
			'username' => 'max',
			'password' => Hash::make('max'),
			'forename' => 'Max',
			'lastname' => 'Mustermann',
			'email' => 'max.mustermann@gmail.com',
			'birthdate' => '1990-01-01',
			'gender' => 'male',
			'about' => 'Ich mag Lorem Ipsum.',
			'profile_pic' => '',
			));	

	}

}