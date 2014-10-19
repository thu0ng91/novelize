<?php

class EntryController extends \BaseController {

  public function __construct()
  {
    $this->beforeFilter('auth');
  }

	/**
	 * Display a listing of the resource.
	 *
	 * GET /app/journal
	 * ROUTE view_journal
	 *
	 * @return Response
	 */
	public function index()
	{
    $type = Request::get('type');

    $entries = Entry::getPaginated(compact('type'));

    $allCount = Entry::all()->count();
    $trashCount = Entry::onlyTrashed()->get()->count();

		return View::make('entries.index',
      compact('entries', 'type', 'allCount', 'trashCount'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * GET /app/journal/entry/create
	 * ROUTE create_entry
	 *
	 * @return Response
	 */
	public function create()
	{
    return View::make('entries.create');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * GET /app/journal/entry/{entryId}/edit
	 * ROUTE edit_entry
	 *
	 * @param  int  $entryId
	 * @return Response
	 */
	public function edit($entryId)
	{
    $entry = Entry::findOrFail($entryId);

    return View::make('entries.edit', compact('entry'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * POST /entry/store
	 * ROUTE store_entry
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();

		// Validation
		$validator = Validator::make($data, Entry::$rules);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator->errors())
				->withInput();
		}

		// Add to $data
		$data = array_add($data, 'owner_id', Auth::user()->id);

		// Action
		$entry = Entry::create($data);

		// Return
		return Redirect::route('edit_entry', $entry->id)
			->with('flash_success', trans('entry.stored'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * POST /entry/{entryId}/update
	 * ROUTE update_entry
	 *
	 * @param  int  $entryId
	 * @return Response
	 */
	public function update($entryId)
	{
		$entry = Entry::findOrFail($entryId);
		$data = Input::all();

		// Validation
		$validator = Validator::make($data, Entry::$rules);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator->errors())
				->withInput();
		}

		// Action
		$entry->update($data);

		// Return
		return Redirect::route('edit_entry', $entry->id)
			->with('flash_success', trans('entry.updated'));
	}

  /**
   * Put the entry in trash.
	 *
   * GET /entry/{entryId}/trash
	 * ROUTE trash_entry
   *
   * @param  int  $entryId
   * @return Response
   */
  public function trash($entryId)
  {
    Entry::find($entryId)->delete();

    return Redirect::route('view_journal')
			->with('alert_danger',  trans('entry.trashed', ['route' => route('restore_entry', $entryId)]));
  }

  /**
   * Restore the entry from trash.
	 *
   * GET /entry/{entryId}/restore
	 * ROUTE restore_entry
   *
   * @param  int  $entryId
   * @return Response
   */
  public function restore($entryId)
  {
    Entry::withTrashed()->where('id', $entryId)->restore();

    return Redirect::route('view_journal')
			->with('flash_success', trans('entry.restored'));
  }

	/**
	 * Remove the entry from storage.
	 *
	 * GET /entry/{entryId}/destroy
	 * ROUTE destroy_entry
	 *
	 * @param  int  $entryId
	 * @return Response
	 */
	public function destroy($entryId)
	{
    Entry::withTrashed()->where('id', $entryId)->forceDelete();

    return Redirect::route('view_journal')
			->with('flash_danger', trans('entry.destroyed'));
	}

}