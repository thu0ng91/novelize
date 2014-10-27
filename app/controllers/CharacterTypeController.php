<?php

class CharacterTypeController extends \BaseController {

  public function __construct()
  {
    $this->beforeFilter('auth');
  }

	/**
	 * Display a listing of the resource.
	 *
	 * GET /admin/settings/character_types
	 * ROUTE view_character_types
	 *
	 * @return Response
	 */
	public function index()
	{
    $characterTypes = CharacterType::all();

		return View::make('admin.charactertypes', compact('characterTypes'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * POST /admin/settings/character_types/store
	 * ROUTE store_character_type
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();

		// Validation
		$validator = Validator::make($data, CharacterType::$rules);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator->errors())
				->withInput();
		}

		// Action
		CharacterType::create($data);

		// Return
		return Redirect::route('view_character_types')
			->with('flash_success', trans('charactertype.stored'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * PUT /admin/settings/character_types/{characterTypeId}/update
	 * ROUTE update_character_type
	 *
	 * @param  int  $characterTypeId
	 * @return Response
	 */
	public function update($characterTypeId)
	{
		$characterType = CharacterType::findOrFail($characterTypeId);

		$data = Input::all();

		// Validation
		$validator = Validator::make($data, CharacterType::$rules);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator->errors())
				->withInput();
		}

		// Action
		$characterType->update($data);

		// Return
		return Redirect::route('view_character_types')
			->with('flash_success', trans('charactertype.updated'));
	}

}