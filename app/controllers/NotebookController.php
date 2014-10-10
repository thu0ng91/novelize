<?php

class NotebookController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * GET /app/notebooks
	 * ROUTE view_notebooks
	 *
	 * @return Response
	 */
	public function index()
	{
    $type = Request::get('type');

    if($type == 'trashed')
    {
      $notebooks = Notebook::where('owner_id', '=', Auth::user()->id)
        ->onlyTrashed()
        ->get();
    }
    else
    {
      $notebooks = Notebook::where('owner_id', '=', Auth::user()->id)
      	->orderBy('name', 'ASC')
        ->with('novels', 'characters', 'locations', 'items', 'notes')
        ->get();
    }

    $allCount = Notebook::all()->count();
    $trashCount = Notebook::onlyTrashed()->get()->count();

		return View::make('notebooks.index',
      compact('notebooks', 'type', 'allCount', 'trashCount'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * GET /app/notebook/create
	 * ROUTE create_notebook
	 *
	 * @return Response
	 */
	public function create()
	{
    return View::make('notebooks.create');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * GET /app/notebook/{notebookId}/new_notebook
	 * ROUTE create_notebook
	 *
	 * @return Response
	 */
	public function new_notebook($notebookId)
	{
    $notebook = Notebook::findOrFail($notebookId);

    return View::make('notebooks.new', compact('notebook'));
	}

	/**
	 * Display the specified resource.
	 *
	 * GET /app/notebook/{notebookId}/show
	 * ROUTE show_notebook
	 *
	 * @param  int  $notebookId
	 * @return Response
	 */
	public function show($notebookId)
	{
    $notebook = Notebook::findOrFail($notebookId);

    return View::make('notebooks.show', compact('notebook'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * GET /app/notebook/{notebookId}/edit
	 * ROUTE edit_notebook
	 *
	 * @param  int  $notebookId
	 * @return Response
	 */
	public function edit($notebookId)
	{
    $notebook = Notebook::findOrFail($notebookId);

    return View::make('notebooks.edit', compact('notebook'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * POST /notebook/store
	 * ROUTE store_notebook
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();

		// Validation
		$validator = Validator::make($data, Notebook::$rules);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator->errors())
				->withInput();
		}

		// Add to $data
    $data = array_add($data, 'owner_id', Auth::user()->id);

		// Action
		$notebook = Notebook::create($data);

		// Return
		return Redirect::route('new_notebook', $notebook->id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * POST /notebook/{notebookId}/update
	 * ROUTE update_notebook
	 *
	 * @param  int  $notebookId
	 * @return Response
	 */
	public function update($notebookId)
	{
		$notebook = Notebook::findOrFail($notebookId);
		$data = Input::all();

		// Validation
		$validator = Validator::make($data, Notebook::$rules);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator->errors())
				->withInput();
		}

		// Action
		$notebook->update($data);

		// Return
		return Redirect::route('view_notebooks')
			->with('flash_success', trans('notebook.updated'));
	}

  /**
   * Put the notebook in trash.
	 *
   * GET /notebook/{notebookId}/trash
	 * ROUTE trash_notebook
   *
   * @param  int  $notebookId
   * @return Response
   */
  public function trash($notebookId)
  {
  	$notebook = Notebook::with('novels')->findOrFail($notebookId);

    if( $notebook->novels->count() > 0 )
    {
      return Redirect::route('view_notebooks')
      ->with('alert_danger', trans('notebook.delete_novels'));
    }

    Notebook::find($notebookId)->delete();

    return Redirect::route('view_notebooks')
			->with('alert_danger', trans('notebook.trashed', ['route' => route('restore_notebook', $notebookId)]));
  }

  /**
   * Restore the notebook from trash.
	 *
   * GET /notebook/{notebookId}/restore
	 * ROUTE restore_notebook
   *
   * @param  int  $notebookId
   * @return Response
   */
  public function restore($notebookId)
  {
    Notebook::withTrashed()->where('id', $notebookId)->restore();

    return Redirect::route('view_notebooks')
			->with('flash_success', trans('notebook.restored'));
  }

	/**
	 * Remove the notebook from storage.
	 *
	 * GET /notebook/{notebookId}/destroy
	 * ROUTE destroy_notebook
	 *
	 * @param  int  $notebookId
	 * @return Response
	 */
	public function destroy($notebookId)
	{
    Notebook::withTrashed()->where('id', $notebookId)->forceDelete();

    return Redirect::route('view_notebooks')
			->with('flash_danger', trans('notebook.destroyed'));
	}

}