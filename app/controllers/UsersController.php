<?php

class UsersController extends BaseController {

	protected $layout = "layouts.main";

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user= Auth::user();

		return View::make('dashboard', compact('user'));
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
	public function one( $user_id = null )
	{
	}

	/**
	 * Zeigt Registrierungsformular
	 *
	 * @return Response
	 */
	public function register()
	{
		$this->layout->content = View::make('users.register');
	}

	/**
	 * Zeigt Loginformular
	 *
	 * @return Response
	 */
	public function getLogin()
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

		return Redirect::to('/')->with('message', 'You are now logged out.');
	}

	/**
	 * Fügt einen Nutzer hinzu
	 *
	 * @return Response
	 */
	public function add( /*$user_id = null*/ )
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



}
