<?php

class CharacterController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * GET /notebook/{notebookId}/characters
	 * ROUTE view_characters
	 *
	 * @param  int  $notebookId
	 * @return Response
	 */
	public function index($notebookId)
	{
    $type = Request::get('type');

    if($type == 'trashed')
    {
      $characters = Character::where('notebook_id', '=', $notebookId)
        ->onlyTrashed()
        ->paginate(10);
    }
    else
    {
      $characters = Character::where('notebook_id', '=', $notebookId)
      	->orderBy('name', 'ASC')
        ->paginate(10);
    }

    $notebook = Notebook::with('characters', 'locations', 'items', 'notes')->findOrFail($notebookId);

    $allCount = Character::where('notebook_id', '=', $notebookId)
    											->get()
    											->count();
    $trashCount = Character::where('notebook_id', '=', $notebookId)
    											->onlyTrashed()
    											->get()
    											->count();

		return View::make('characters.index',
      compact('characters', 'notebook', 'type', 'allCount', 'trashCount'));
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
    $types = CharacterType::all();
    $character = new Character;

    return View::make('characters.create', compact('notebook', 'character', 'types'));
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
    $types = CharacterType::all();
    $character = Character::findOrFail($characterId);

    return View::make('characters.edit', compact('notebook', 'character', 'types'));
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
		$validator = Validator::make($data, Character::$rules);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator->errors())
				->withInput();
		}

		// Add to $data
    $data = array_add($data, 'notebook_id', $notebookId);

		// Action
		$character = Character::create($data);

		// Return
		return Redirect::route('view_characters', $notebookId)
			->with('flash_success', trans('character.stored'));
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
		$character = Character::findOrFail($characterId);

		$data = Input::all();

		// Validation
		$validator = Validator::make($data, Character::$rules);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator->errors())
				->withInput();
		}

		// Action
		$character->update($data);

		// Return
		return Redirect::route('view_characters', $notebookId)
			->with('flash_success', trans('character.updated'));
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
    $character = Character::find($characterId);

    $character->delete();

    return Redirect::route('view_characters', $notebookId)
			->with('alert_danger', trans('character.trashed', ['route' => route('restore_character', [$notebookId, $characterId])]));
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
    $character = Character::withTrashed()->where('id', $characterId);

    $character->restore();

    return Redirect::route('view_characters', $notebookId)
			->with('flash_success', trans('character.restored'));
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
    Character::withTrashed()->where('id', $characterId)->forceDelete();

    return Redirect::route('view_characters', $notebookId)
			->with('flash_danger', trans('character.destroyed'));
	}

}