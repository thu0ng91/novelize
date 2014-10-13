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
			return Redirect::back()
				->withInput()
        ->with('alert_danger', trans('session.invalid'));
		}

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
		Auth::logout();

		return Redirect::route('login');
	}

}