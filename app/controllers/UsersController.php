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
		$trips = Trip::orderBy('created_at', 'DESC')->get();
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
		$trips = Trip::where('user_id', '=', $user_id)->get();
		return View::make('users.profile')->with('user', $user)->with('trips', $trips);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function user_trips( $user_id )
	{
		$user = User::findOrFail($user_id);
		$trips = Trip::where('user_id', '=', $user_id)->get();
		return View::make('users.showUserTrips')->with('trips', $trips)->with('user', $user);
	}

	/**
	 * Zeigt Registrierungsformular
	 *
	 * @return Response
	 */
	public function getRegisterForm()
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
		if (Auth::check()) {
			if (Auth::id() == $user_id){
			// get the user
				$user = User::find($user_id);

			// show the edit form and pass the user
				return View::make('users.edit')
				->with('user', $user);
			}  else {
				$user = User::findOrFail($user_id);
				$trips = Trip::where('user_id', '=', $user_id)->get();
				return View::make('users.profile')->with('user', $user)->with('trips', $trips);
			}
		}
	}


	/**
	    * Update the specified resource in storage.
	    *
	    * @param  int  $id
	    * @return Response
	    */
	public function update($id)
	{
	       // validate
	       // read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'username'       => 'required',
			'forename'      => 'required',
			'lastname'      => 'required',
			'email'      => 'required|email',
			'profile_pic' => 'image|max:10000'
			);


		$validator = Validator::make(Input::all(), $rules);
	       // process the login
		if ($validator->fails()) {
			return Redirect::to('users/' . $id . '/edit')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} else {
	           // store
			$user = User::find($id);

			$file = Input::file('profile_pic');
			if(Input::hasFile('profile_pic')){

				$extension = $file->getClientOriginalExtension();
				$directory = public_path().'/uploads/'.Auth::id();
				$filename = Auth::id().time().".{$extension}";

				$upload_success = $file->move($directory, $filename);


				if($upload_success){
					$user->profile_pic = URL::to('/uploads')."/".Auth::id()."/{$filename}";
				}
			}
			$user->username = Input::get('username');
			$user->forename = Input::get('forename');
			$user->lastname = Input::get('lastname');
			$user->email = Input::get('email');
			$user->about = Input::get('about');

			$user->save();

	           // redirect
			Session::flash('message', 'Successfully updated user!');
			$trips = Trip::where('user_id', '=', $id)->get();
			return View::make('users.profile', compact('user'))->with('trips', $trips);
		}
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
