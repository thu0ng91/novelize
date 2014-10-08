<?php

class NovelController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * GET /novels
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
        ->orderBy('title', 'ASC')
        ->get();
    }
    else
    {
      $novels = Novel::where('owner_id', '=', Auth::user()->id)
        ->with('notebook', 'scenes')
        ->orderBy('title', 'ASC')
        ->get();
    }

    $notebookCount = Notebook::where('owner_id', '=', Auth::user()->id)->get()->count();

    $allCount = Novel::all()->count();
    $trashCount = Novel::onlyTrashed()->get()->count();

		return View::make('novels.index', compact('novels', 'type', 'allCount', 'trashCount', 'notebookCount'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * GET /novel/create
	 * ROUTE create_novel
	 *
	 * @return Response
	 */
	public function create()
	{
    $notebooks = Notebook::where('owner_id', '=', Auth::user()->id)->orderBy('name', 'ASC')->get();
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
        ->with('alert_info', trans('novel.notebook_first'));
    }

    return View::make('novels.create', compact('notebooks', 'genres', 'name'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * GET /novel/{novelId}/edit
	 * ROUTE edit_novel
	 *
	 * @param  int  $novelId
	 * @return Response
	 */
	public function edit($novelId)
	{
    $novel = Novel::findOrFail($novelId);
    $notebooks = Notebook::where('owner_id', '=', Auth::user()->id)->orderBy('name', 'ASC')->get();
    $genres = Genre::all();

    return View::make('novels.edit', compact('novel', 'notebooks', 'genres'));
	}



  /**
   * Display the specified resource.
   *
   * GET /novel/{novelId}/plot
   * ROUTE write_novel
   *
   * @param  int  $novelId
   * @return Response
   */
  public function plot($novelId, $sceneId)
  {
    $novel = Novel::findOrFail($novelId);
    $chapters = Chapter::where('novel_id', '=', $novelId)
    	->orderBy('chapter_order', 'asc')
    	->with('scenes')
    	->get();

    $notebookId = $novel->notebook_id;
    $notebook = Notebook::findOrFail($notebookId);

    $currentScene = Scene::findOrFail($sceneId);

    return View::make('novels.plot', compact('novel', 'chapters', 'currentScene', 'notebook'));
  }

  /**
   * Display the specified resource.
   *
   * GET /novel/{novelId}/write/{sceneId}
   * ROUTE write_novel
   *
   * @param  int  $novelId
   * @param  int  $sceneId
   * @return Response
   */
  public function write($novelId, $sceneId)
  {
    $novel = Novel::findOrFail($novelId);
    $chapters = Chapter::where('novel_id', '=', $novelId)
    	->orderBy('chapter_order', 'asc')
    	->with('scenes')
    	->get();

    $notebookId = $novel->notebook_id;
    $notebook = Notebook::findOrFail($notebookId);

    $currentScene = Scene::with('chapter')->findOrFail($sceneId);

    return View::make('novels.write', compact('novel', 'chapters', 'currentScene', 'notebook'));
  }

  /**
   * Display the specified resource.
   *
   * GET /novel/{novelId}/review/{sceneId}
   * ROUTE write_novel
   *
   * @param  int  $novelId
   * @param  int  $sceneId
   * @return Response
   */
  public function review($novelId, $sceneId)
  {
    $novel = Novel::findOrFail($novelId);
    $chapters = Chapter::where('novel_id', '=', $novelId)
    	->orderBy('chapter_order', 'asc')
    	->with('scenes')
    	->get();

    $notebookId = $novel->notebook_id;
    $notebook = Notebook::findOrFail($notebookId);


    $currentScene = Scene::with('chapter')->findOrFail($sceneId);

    return View::make('novels.review', compact('novel', 'chapters', 'currentScene', 'notebook'));
  }

  /**
   * Display the specified resource.
   *
   * GET /novel/{novelId}/publish
   * ROUTE write_novel
   *
   * @param  int  $novelId
   * @return Response
   */
  public function publish($novelId, $sceneId)
  {
    $novel = Novel::findOrFail($novelId);
    $chapters = Chapter::where('novel_id', '=', $novelId)
    	->orderBy('chapter_order', 'asc')
    	->with('scenes')
    	->get();

    $notebookId = $novel->notebook_id;
    $notebook = Notebook::findOrFail($notebookId);


    $currentScene = Scene::findOrFail($sceneId);

    return View::make('novels.publish', compact('novel', 'chapters', 'currentScene', 'notebook'));
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
		$novel_data = Input::all();

		// Validation
		$validator = Validator::make($novel_data, Novel::$rules);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator->errors())
				->withInput();
		}

		// Create Novel
    $novel_data = array_add($novel_data, 'owner_id', Auth::user()->id);
		$new_novel = Novel::create($novel_data);

		// Create First Chapter
    $chapter_data = [
    	'novel_id' => $new_novel->id,
    	'chapter_order' => 1,
    	'title' => 'First Chapter',
    ];
		$new_chapter = Chapter::create($chapter_data);

		// Create First Scene
    $scene_data = [
    	'chapter_id' => $new_chapter->id,
    	'scene_order' => 1,
    	'title' => 'First Scene',
    ];
		$new_scene = Scene::create($scene_data);

		// Return
		return Redirect::route('write_novel', [$new_novel->id, $new_scene->id] )
			->with('flash_success', trans('novel.stored'));
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
		return Redirect::route('edit_novel', $novel->id)
			->with('flash_success', trans('novel.updated'));
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
			->with('alert_danger', trans('novel.trashed', ['route' => route('restore_novel', $novelId)]));
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

    return Redirect::route('view_novels')
			->with('flash_success', trans('novel.restored'));
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

    return Redirect::route('view_novels')
			->with('flash_danger', trans('novel.destroyed'));
	}

}