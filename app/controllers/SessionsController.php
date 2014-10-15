<?php

class SessionsController extends \BaseController {

	/**
	 * Store the session and login.
	 *
	 * POST /login
	 * ROUTE login
	 *
	 * @return Response
	 */
	public function store()
	{
		$credentials = Input::only('email', 'password');
    $remember = Input::get('remember');

		// Validation
    $validator = Validator::make($credentials, User::$rulesLogin);

    if ($validator->fails())
    {
      return Redirect::back()
      	->withInput()
      	->withErrors($validator->errors());
    }


    // Action
    if($remember === 'true')
    {
      $attempt = Auth::attempt($credentials, true);
    }
    else
    {
      $attempt = Auth::attempt($credentials);
    }

    // Redirect
		if(! $attempt)
		{

	    $session_data = [
	    	'session_type' => 'failed login',
	    	'email_address' => $credentials['email'],
	    ];

	    UserSession::create($session_data);

			return Redirect::back()
				->withInput()
        ->with('alert_danger', trans('session.invalid'));
		}

    // Store in Session Log
    $session_data = [
    	'session_type' => 'login',
    	'user_id' => Auth::id(),
	    'email_address' => $credentials['email'],
    ];

    UserSession::create($session_data);

		return Redirect::intended('/');
	}

	/**
	 * Remove the session and logout.
	 *
	 * GET /logout
	 * ROUTE logout
	 *
	 * @return Response
	 */
	public function destroy()
	{
		$user = User::find(Auth::id());

    // Store in Session Log
    $session_data = [
    	'session_type' => 'logout',
    	'user_id' => $user->id,
	    'email_address' => $user->email,
    ];

		Auth::logout();

    UserSession::create($session_data);

		return Redirect::route('login');
	}

}