<?php

class NovelController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * GET /app/novels
	 * ROUTE view_novels
	 *
	 * @return Response
	 */
	public function index()
	{
    $type = Request::get('type');

    if($type == 'trashed')
    {
      $novels = Novel::where('owner_id', '=', Auth::user()->id)
        ->onlyTrashed()
        ->get();
    }
    else 
    {
      $novels = Novel::where('owner_id', '=', Auth::user()->id)
        ->with('notebook', 'sections')
        ->get();
    }

    $allCount = Novel::all()->count();
    $trashCount = Novel::onlyTrashed()->get()->count();

		return View::make('novels.index', compact('novels', 'type', 'allCount', 'trashCount'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * GET /app/novel/create
	 * ROUTE create_novel
	 *
	 * @return Response
	 */
	public function create()
	{
    $notebooks = Notebook::where('owner_id', '=', Auth::user()->id)->get();
    $genres = Genre::all();

    // Pass profile name to Author as default if available
    $profile = Profile::findOrFail(Auth::user()->id);

    if($profile['first_name'] && $profile['last_name'])
    {
      $name = $profile['first_name'] . " " . $profile['last_name'];
    }
    else
    {
      $name = null;
    }

    // If there are no notebooks require them to create one first.
    if(! $notebooks->count())
    {
      return Redirect::route('create_notebook')
        ->with('alert_success', 'Please create a notebook to store you Novel first');
    }

    return View::make('novels.create', compact('notebooks', 'genres', 'name'));
	}

	/**
	 * Display the specified resource.
	 *
	 * GET /app/novel/{novelId}/show
	 * ROUTE show_novel
	 *
	 * @param  int  $novelId
	 * @return Response
	 */
	public function show($novelId)
	{
    $novel = Novel::findOrFail($novelId);

    return View::make('novels.show', compact('novel'));
	}

  /**
   * Display the specified resource.
   *
   * GET /app/novel/{novelId}/write
   * ROUTE write_novel
   *
   * @param  int  $novelId
   * @return Response
   */
  public function write($novelId)
  {
    $novel = Novel::with('sections')->findOrFail($novelId);

    return View::make('novels.write', compact('novel'));
  }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * GET /app/novel/{novelId}/edit
	 * ROUTE edit_novel
	 *
	 * @param  int  $novelId
	 * @return Response
	 */
	public function edit($novelId)
	{
    $novel = Novel::findOrFail($novelId);
    $notebooks = Notebook::where('owner_id', '=', Auth::user()->id)->get();
    $genres = Genre::all();

    return View::make('novels.edit', compact('novel', 'notebooks', 'genres'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * POST /novel/store
	 * ROUTE store_novel
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();

		// Validation
		$validator = Validator::make($data, Novel::$rules);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator->errors())
				->withInput();
		}

		// Add to $data
    $data = array_add($data, 'owner_id', Auth::user()->id);

		// Action
		Novel::create($data);

		// Return
		return Redirect::route('view_novels')
			->with('alert_success', 'novel has been added');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * POST /novel/{novelId}/update
	 * ROUTE update_novel
	 *
	 * @param  int  $novelId
	 * @return Response
	 */
	public function update($novelId)
	{
		$novel = Novel::findOrFail($novelId);
		$data = Input::all();

		// Validation
		$validator = Validator::make($data, Novel::$rules);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator->errors())
				->withInput();
		}

		// Action
		$novel->update($data);

		// Return
		return Redirect::route('view_novels')
			->with('alert_success', 'novel has been updated');
	}

  /**
   * Put the novel in trash.
	 *
   * GET /novel/{novelId}/trash
	 * ROUTE trash_novel
   *
   * @param  int  $novelId
   * @return Response
   */
  public function trash($novelId)
  {
    Novel::find($novelId)->delete();

    return Redirect::route('view_novels')
			->with('alert_success', 'novel has been trashed');
  }

  /**
   * Restore the novel from trash.
	 *
   * GET /novel/{novelId}/restore
	 * ROUTE restore_novel
   *
   * @param  int  $novelId
   * @return Response
   */
  public function restore($novelId)
  {
    Novel::withTrashed()->where('id', $novelId)->restore();

    return Redirect::route('view_novels', ['type' => 'trashed'])
			->with('alert_success', 'novel has been restored');
  }

	/**
	 * Remove the novel from storage.
	 *
	 * GET /novel/{novelId}/destroy
	 * ROUTE destroy_novel
	 *
	 * @param  int  $novelId
	 * @return Response
	 */
	public function destroy($novelId)
	{
    Novel::withTrashed()->where('id', $novelId)->forceDelete();

    return Redirect::route('view_novels', ['type' => 'trashed'])
			->with('alert_success', 'novel has been destroyed');
	}

}