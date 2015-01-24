<?php

class UsersController extends BaseController {

	protected $layout = "layouts.main";

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function dashboard()
	{
		$user= Auth::user();
		$trips = Trip::all();
		return View::make('dashboard', compact('user','trips'));
	}


	// CRUD
	// ---------------------------------------------------

	/**
	 * Gibt mehrere Nutzer zurück
	 *
	 * @return Response
	 */
	public function all()
	{
	}

	/**
	 * Gibt einen Nutzer zurück
	 *
	 * @param  int  $user_id
	 * @return Response
	 */
	public function one( $user_id )
	{
		$user = User::findOrFail($user_id);
		return View::make('users.profile', compact('user'));
	}

	/**
	 * Zeigt Registrierungsformular
	 *
	 * @return Response
	 */
	public function register()
	{
		return View::make('users.register');
	}

	/**
	 * Zeigt Loginformular
	 *
	 * @return Response
	 */
	public function getLoginForm()
	{
		return View::make('users.login');
	}

	/**
	 * Login Action
	 *
	 * @return Response
	 */
	public function login()
	{
		if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password'))))
		{
			return Redirect::intended('/')->with('message', 'You are now logged in!');
		} else {
			return Redirect::intended('login')->with('message', 'Your username/password combination was incorrect');
		}
	}

	/**
	 * Logout Action
	 *
	 * @return Response
	 */
	public function logout()
	{
		Auth::logout();
		Session::flush();
		return Redirect::to('/')->with('message', 'You are now logged out.');
	}

	/**
	 * Fügt einen Nutzer hinzu
	 *
	 * @return Response
	 */
	public function add()
	{
		$validator = Validator::make(Input::all(), User::$rules);

		if ($validator->passes()) {
			$user = new User;
			$user->username = Input::get('username');
			$user->forename = Input::get('forename');
			$user->lastname = Input::get('lastname');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->save();

			return Redirect::to('login')->with('message', 'Thanks for registering!');

		} else {
			return Redirect::to('register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
	}

	/**
	 * Bearbeitet einen Nutzer
	 *
	 * @param  int  $user_id
	 * @return Response
	 */
	public function edit( $user_id = null )
	{
	}

	/**
	 * Löscht einen Nutzer
	 *
	 * @param  int  $user_id
	 * @return Response
	 */
	public function remove( $user_id = null )
	{
	}

	public function getRememberToken()
	{
		return $this->remember_token;
	}

	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
		return 'remember_token';
	}



}
