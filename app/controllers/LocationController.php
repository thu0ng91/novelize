<?php

class LocationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * GET /notebook/{notebookId}/locations
	 * ROUTE view_locations
	 *
	 * @param  int  $notebookId
	 * @return Response
	 */
	public function index($notebookId)
	{
    $type = Request::get('type');

    if($type == 'trashed')
    {
      $locations = Location::where('notebook_id', '=', $notebookId)
        ->onlyTrashed()
        ->paginate(10);
    }
    else
    {
      $locations = Location::where('notebook_id', '=', $notebookId)
      	->orderBy('name', 'ASC')
        ->paginate(10);
    }

    $notebook = Notebook::with('characters', 'locations', 'items', 'notes')->findOrFail($notebookId);

    $allCount = Location::all()->count();
    $trashCount = Location::onlyTrashed()->get()->count();

		return View::make('locations.index',
      compact('locations', 'notebook', 'type', 'allCount', 'trashCount'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * GET /notebook/{notebookId}/character/create
	 * ROUTE create_character
	 *
	 * @param  int  $notebookId
	 * @return Response
	 */
	public function create($notebookId)
	{
    $notebook = Notebook::findOrFail($notebookId);

    return View::make('locations.create', compact('notebook'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * GET /notebook/{notebookId}/character/{characterId}/edit
	 * ROUTE edit_character
	 *
	 * @param  int  $notebookId
	 * @param  int  $characterId
	 * @return Response
	 */
	public function edit($notebookId, $characterId)
	{
    $notebook = Notebook::findOrFail($notebookId);

    $character = Location::findOrFail($characterId);

    return View::make('locations.edit', compact('notebook', 'character'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * POST /notebook/{notebookId}/character/store
	 * ROUTE store_character
	 *
	 * @param  int  $notebookId
	 * @return Response
	 */
	public function store($notebookId)
	{
		$data = Input::all();

		// Validation
		$validator = Validator::make($data, Location::$rules);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator->errors())
				->withInput();
		}

		// Add to $data
    $data = array_add($data, 'notebook_id', $notebookId);

		// Action
		$character = Location::create($data);

		// Return
		return Redirect::route('edit_character', $notebookId, $character->id)
			->with('flash_success', 'character has been added');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * PUT /notebook/{notebookId}/character/{characterId}/update
	 * ROUTE update_character
	 *
	 * @param  int  $notebookId
	 * @param  int  $characterId
	 * @return Response
	 */
	public function update($notebookId, $characterId)
	{
		$character = Location::findOrFail($characterId);

		$data = Input::all();

		// Validation
		$validator = Validator::make($data, Location::$rules);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator->errors())
				->withInput();
		}

		// Action
		$character->update($data);

		// Return
		return Redirect::route('edit_character', [$notebookId, $characterId])
			->with('flash_success', 'Location has been updated');
	}

  /**
   * Put the character in trash.
	 *
   * GET /notebook/{notebookId}/character/{characterId}/trash
	 * ROUTE trash_character
   *
	 * @param  int  $notebookId
   * @param  int  $characterId
   * @return Response
   */
  public function trash($notebookId, $characterId)
  {
    $character = Location::find($characterId);

    $character->delete();

    $alert_message = $character->name . ' has been trashed. (<a href="' . route("restore_character", [$notebookId, $characterId]) . '">undo</a>)';

    return Redirect::route('view_locations', $notebookId)
			->with('alert_warning', $alert_message);
  }

  /**
   * Restore the character from trash.
	 *
   * GET /notebook/{notebookId}/character/{characterId}/restore
	 * ROUTE restore_character
   *
	 * @param  int  $notebookId
   * @param  int  $characterId
   * @return Response
   */
  public function restore($notebookId, $characterId)
  {
    $character = Location::withTrashed()->where('id', $characterId);

    $character->restore();

    $alert_message = 'Location has been restored. (<a href="' . route("edit_character", [$notebookId, $characterId]) . '">edit</a>)';

    return Redirect::route('view_locations', ['type' => 'trashed', 'notebookId' => $notebookId])
			->with('alert_success', $alert_message);
  }

	/**
	 * Remove the character from storage.
	 *
	 * GET /notebook/{notebookId}/character/{characterId}/destroy
	 * ROUTE destroy_character
	 *
	 * @param  int  $notebookId
	 * @param  int  $characterId
	 * @return Response
	 */
	public function destroy($notebookId, $characterId)
	{
    Location::withTrashed()->where('id', $characterId)->forceDelete();

    return Redirect::route('view_locations', ['type' => 'trashed', 'notebookId' => $notebookId])
			->with('alert_danger', 'Location has been destroyed');
	}

}