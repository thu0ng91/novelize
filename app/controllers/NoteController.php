<?php

class NoteController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * GET /notebook/{notebookId}/notes
	 * ROUTE view_notes
	 *
	 * @param  int  $notebookId
	 * @return Response
	 */
	public function index($notebookId)
	{
    $type = Request::get('type');

    if($type == 'trashed')
    {
      $notes = Note::where('notebook_id', '=', $notebookId)
        ->onlyTrashed()
        ->paginate(10);
    }
    else
    {
      $notes = Note::where('notebook_id', '=', $notebookId)
      	->orderBy('name', 'ASC')
        ->paginate(10);
    }

    $notebook = Notebook::with('characters', 'locations', 'items', 'notes')->findOrFail($notebookId);

    $allCount = Note::all()->count();
    $trashCount = Note::onlyTrashed()->get()->count();

		return View::make('notes.index',
      compact('notes', 'notebook', 'type', 'allCount', 'trashCount'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * GET /notebook/{notebookId}/note/create
	 * ROUTE create_note
	 *
	 * @param  int  $notebookId
	 * @return Response
	 */
	public function create($notebookId)
	{
    $notebook = Notebook::findOrFail($notebookId);

    return View::make('notes.create', compact('notebook'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * GET /notebook/{notebookId}/note/{noteId}/edit
	 * ROUTE edit_note
	 *
	 * @param  int  $notebookId
	 * @param  int  $noteId
	 * @return Response
	 */
	public function edit($notebookId, $noteId)
	{
    $notebook = Notebook::findOrFail($notebookId);

    $note = Note::findOrFail($noteId);

    return View::make('notes.edit', compact('notebook', 'note'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * POST /notebook/{notebookId}/note/store
	 * ROUTE store_note
	 *
	 * @param  int  $notebookId
	 * @return Response
	 */
	public function store($notebookId)
	{
		$data = Input::all();

		// Validation
		$validator = Validator::make($data, Note::$rules);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator->errors())
				->withInput();
		}

		// Add to $data
    $data = array_add($data, 'notebook_id', $notebookId);

		// Action
		$note = Note::create($data);

		// Return
		return Redirect::route('edit_note', $notebookId, $note->id)
			->with('flash_success', trans('note.stored'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * PUT /notebook/{notebookId}/note/{noteId}/update
	 * ROUTE update_note
	 *
	 * @param  int  $notebookId
	 * @param  int  $noteId
	 * @return Response
	 */
	public function update($notebookId, $noteId)
	{
		$note = Note::findOrFail($noteId);

		$data = Input::all();

		// Validation
		$validator = Validator::make($data, Note::$rules);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator->errors())
				->withInput();
		}

		// Action
		$note->update($data);

		// Return
		return Redirect::route('edit_note', [$notebookId, $noteId])
			->with('flash_success', trans('note.updated'));
	}

  /**
   * Put the note in trash.
	 *
   * GET /notebook/{notebookId}/note/{noteId}/trash
	 * ROUTE trash_note
   *
	 * @param  int  $notebookId
   * @param  int  $noteId
   * @return Response
   */
  public function trash($notebookId, $noteId)
  {
    $note = Note::find($noteId);

    $note->delete();

    return Redirect::route('view_notes', $notebookId)
			->with('alert_danger', trans('note.trashed', ['route' => route('restore_note', [$notebookId, $noteId])]));
  }

  /**
   * Restore the note from trash.
	 *
   * GET /notebook/{notebookId}/note/{noteId}/restore
	 * ROUTE restore_note
   *
	 * @param  int  $notebookId
   * @param  int  $noteId
   * @return Response
   */
  public function restore($notebookId, $noteId)
  {
    $note = Note::withTrashed()->where('id', $noteId);

    $note->restore();

    return Redirect::route('view_notes', $notebookId)
			->with('flash_success', trans('note.restored'));
  }

	/**
	 * Remove the note from storage.
	 *
	 * GET /notebook/{notebookId}/note/{noteId}/destroy
	 * ROUTE destroy_note
	 *
	 * @param  int  $notebookId
	 * @param  int  $noteId
	 * @return Response
	 */
	public function destroy($notebookId, $noteId)
	{
    Note::withTrashed()->where('id', $noteId)->forceDelete();

    return Redirect::route('view_notes', $notebookId)
			->with('flash_danger', trans('note.destroyed'));
	}

}