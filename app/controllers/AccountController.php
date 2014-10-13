<?php


class AccountController extends \BaseController {

  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * Display the welcome screen
   * GET /welcome
   *
   * @return Response
   */
  public function welcome()
  {
    return View::make('account.welcome');
  }

  /**
   * Display the users profile
   * GET /profile
   *
   * @return Response
   */
  public function profile($userId)
  {
    $user = User::with('profile')->findOrFail($userId);

    return View::make('account.profile', compact('user'));
  }

  /**
   * Display the users contact page
   * GET /contact/{userId}/{type}
   *
   * @return Response
   */
  public function contact($userId, $type)
  {
    $user = User::findOrFail($userId);

    return View::make('account.contact', compact('user', 'type'));
  }



  /**
   * Update Account Info
   */
  public function updateAccount($userId)
  {
    $user = User::findOrFail($userId);
    $data = Input::all();

    if($data['email'] == $user->email)
    {
      $rules = User::$rulesUpdateAccount;
    }
    else
    {
      $rules = User::$rulesUpdateAccountUnique;
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

    if (!Hash::check($data['password'], $user->password))
    {
      return Redirect::back()
        ->with('alert_danger', trans('profile.password_invalid'))
        ->withInput();
    }

    // Validation
    $validator = Validator::make($data, User::$rulesChangePassword);

    if ($validator->fails())
    {
      return Redirect::back()
        ->withErrors($validator->errors())
        ->withInput();
    }

    // Action
    $user->password = $data['newPassword'];

    $user->save();

    // Return
    return Redirect::route('view_profile', $user->id)
      ->with('flash_success', trans('profile.password_updated'));
  }

}