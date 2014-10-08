<?php

class ProfileController extends \BaseController {


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