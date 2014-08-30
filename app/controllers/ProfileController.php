<?php

class ProfileController extends \BaseController {

	/**
	 * Update Account Info
	 */
  public function updateAccount($userId)
  {
    $user = User::findOrFail($userId);
    $data = Input::all();

    // Use appropriate rules based on if the username, email, or both stays the same
    if($data['username'] != $user->username && $data['email'] == $user->email) // !username and email
    {
    	$rules = Profile::$rulesAccountUniqueUser;
    } 
    else if($data['username'] == $user->username && $data['email'] != $user->email)  // username and !email
    {
    	$rules = Profile::$rulesAccountUniqueEmail;
    }
    else if($data['username'] != $user->username && $data['email'] != $user->email) // !username and !email
    {
    	$rules = Profile::$rulesAccountUnique;
    }
    else
    {
    	$rules = Profile::$rulesAccount;
    }

    // Validation
    $validator = Validator::make($data, $rules);

    if ($validator->fails())
    {
      return Redirect::back()
        ->withErrors($validator->errors())
        ->withInput();
    }

    // Action
    $user->update($data);

    // Return
    return Redirect::route('view_profile', $user->id)
      ->with('alert_success', 'Your Account Information has been updated');
  }


	/**
	 * Change Password
	 */
  public function changePassword($userId)
  {
    $user = User::findOrFail($userId);
    $data = Input::all();

    // Validation
    $validator = Validator::make($data, Profile::$rulesPassword);

    if ($validator->fails())
    {
      return Redirect::back()
        ->withErrors($validator->errors())
        ->withInput();
    }

    if (!Hash::check($data['password'], $user->password))
    {
      return Redirect::back()
        ->with('alert_danger', 'The current password is wrong, try again.' )
        ->withInput();
    }

    // Action
    $user->update($data);

    // Return
    return Redirect::route('view_profile', $user->id)
      ->with('alert_success', 'Your Password has been changed');
  }


	/**
	 * Update Profile
	 */
	public function updateProfile($profileId)
	{
		$profile = Profile::with('user')->findOrFail($profileId);
		$data = Input::all();

		//Validation
		$validator = Validator::make($data, Profile::$rulesProfile);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator->errors())
				->withInput();
		}

		// Action
		$profile->update($data);

		// Return
		return Redirect::route('view_profile', $profile->user->id)
			->with('alert_success', 'Your profile information has been updated');
	}

}