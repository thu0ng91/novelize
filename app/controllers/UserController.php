<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * GET /app/users
	 * ROUTE view_users
	 *
	 * @return Response
	 */
	public function index()
	{
    $type = Request::get('type');

    if($type == 'trashed')
    {
      $users = User::onlyTrashed()->paginate(10);
    }
    else
    {
      $users = User::paginate(10);
    }

    $allCount = User::all()->count();
    $trashCount = User::onlyTrashed()->get()->count();

    return View::make('users.index',
      compact('users', 'type', 'allCount', 'trashCount'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * GET /app/user/create
	 * ROUTE create_user
	 *
	 * @return Response
	 */
	public function create()
	{
    return View::make('users.create');
	}

	/**
	 * Display the specified resource.
	 *
	 * GET /app/user/{userId}/show
	 * ROUTE show_user
	 *
	 * @param  int  $userId
	 * @return Response
	 */
	public function show($userId)
	{
    $user = User::findOrFail($userId);

    return View::make('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * GET /app/user/{userId}/edit
	 * ROUTE edit_user
	 *
	 * @param  int  $userId
	 * @return Response
	 */
	public function edit($userId)
	{
    $user = User::findOrFail($userId);
    $roles = Role::all();

    return View::make('users.edit', compact('user', 'roles'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * POST /user/store
	 * ROUTE store_user
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();

		// Validation
		$validator = Validator::make($data, User::$rulesStore);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator->errors())
				->withInput();
		}

		// Add to $data
		$profile = new Profile;
		$profile->save();

		$data = array_add($data, 'role_id', '1');
		$data = array_add($data, 'profile_id', $profile->id);

		// Action
		User::create($data);

    // Return
    return Redirect::route('view_users')
      ->with('alert_info', 'User has been added');
	}

  /**
   * Store a newly created resource in storage.
   *
   * POST /user/register
   * ROUTE register_user
   *
   * @return Response
   */
  public function register()
  {
    $data = Input::all();

    // Validation
    $validator = Validator::make($data, User::$rulesRegister);

    if ($validator->fails())
    {
      return Redirect::back()
        ->withErrors($validator->errors())
        ->withInput();
    }

    // Add to $data
    $profile = new Profile;
    $profile->save();

    $data = array_add($data, 'role_id', '1');
    $data = array_add($data, 'profile_id', $profile->id);

    // Action
    User::create($data);

    // Return
    return Redirect::route('view_notebooks')
      ->with('alert_info', 'Welcome to Novelize, I recommend you start by creating a Notebook to associate with your first Novel');
  }

	/**
	 * Update the specified resource in storage.
	 *
	 * POST /user/{userId}/update
	 * ROUTE update_user
	 *
	 * @param  int  $userId
	 * @return Response
	 */
	public function update($userId)
	{
		$user = User::findOrFail($userId);
		$data = Input::all();

		// Validation
		$validator = Validator::make($data, User::$rulesUpdate);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator->errors())
				->withInput();
		}

		// Action
		$user->update($data);

		// Return
		return Redirect::route('view_users')
			->with('alert_info', 'User has been updated');
	}

  /**
   * Put the user in trash.
	 *
   * GET /user/{userId}/trash
	 * ROUTE trash_user
   *
   * @param  int  $userId
   * @return Response
   */
  public function trash($userId)
  {
    User::find($userId)->delete();

    return Redirect::route('view_users')
			->with('alert_info', 'User has been trashed');
  }

  /**
   * Restore the user from trash.
	 *
   * GET /user/{userId}/restore
	 * ROUTE restore_user
   *
   * @param  int  $userId
   * @return Response
   */
  public function restore($userId)
  {
    User::withTrashed()->where('id', $userId)->restore();

    return Redirect::route('view_users', ['type' => 'trashed'])
			->with('alert_info', 'User has been restored');
  }

	/**
	 * Remove the user from storage.
	 *
	 * GET /user/{userId}/destroy
	 * ROUTE destroy_user
	 *
	 * @param  int  $userId
	 * @return Response
	 */
	public function destroy($userId)
	{
    User::withTrashed()->where('id', $userId)->forceDelete();

    return Redirect::route('view_users', ['type' => 'trashed'])
			->with('alert_info', 'User has been destroyed');
	}

}