<?php

class ProfileController extends \BaseController {

	/**
	 * Update Account Info
	 */
  public function updateAccount($userId)
  {
    $user = User::findOrFail($userId);
    $data = Input::all();

    if($data['email'] != $user->email)
    {
    	$rules = Profile::$rulesAccountUniqueEmail;
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
      ->with('flash_success', trans('profile.account_updated'));
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
        ->with('alert_danger', trans('profile.password_invalid'))
        ->withInput();
    }

    // Action
    $user->password = $data['newPassword'];

    $user->save();

    // Return
    return Redirect::route('view_profile', $user->id)
      ->with('flash_success', trans('profile.password_updated'));
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
			->with('flash_success', trans('profile.profile_updated'));
	}

}