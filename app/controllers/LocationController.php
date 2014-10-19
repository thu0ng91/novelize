<?php

class LocationController extends \BaseController {

  public function __construct()
  {
    $this->beforeFilter('auth');
  }

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
	 * GET /notebook/{notebookId}/location/create
	 * ROUTE create_location
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
	 * GET /notebook/{notebookId}/location/{locationId}/edit
	 * ROUTE edit_location
	 *
	 * @param  int  $notebookId
	 * @param  int  $locationId
	 * @return Response
	 */
	public function edit($notebookId, $locationId)
	{
    $notebook = Notebook::findOrFail($notebookId);

    $location = Location::findOrFail($locationId);

    return View::make('locations.edit', compact('notebook', 'location'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * POST /notebook/{notebookId}/location/store
	 * ROUTE store_location
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
		$location = Location::create($data);

		// Return
		return Redirect::route('view_locations', $notebookId)
			->with('flash_success', trans('location.stored'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * PUT /notebook/{notebookId}/location/{locationId}/update
	 * ROUTE update_location
	 *
	 * @param  int  $notebookId
	 * @param  int  $locationId
	 * @return Response
	 */
	public function update($notebookId, $locationId)
	{
		$location = Location::findOrFail($locationId);

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
		$location->update($data);

		// Return
		return Redirect::route('view_locations', $notebookId)
			->with('flash_success', trans('location.updated'));
	}

  /**
   * Put the location in trash.
	 *
   * GET /notebook/{notebookId}/location/{locationId}/trash
	 * ROUTE trash_location
   *
	 * @param  int  $notebookId
   * @param  int  $locationId
   * @return Response
   */
  public function trash($notebookId, $locationId)
  {
    $location = Location::find($locationId);

    $location->delete();

    return Redirect::route('view_locations', $notebookId)
			->with('alert_danger', trans('location.trashed', ['route' => route('restore_location', [$notebookId, $locationId])]));
  }

  /**
   * Restore the location from trash.
	 *
   * GET /notebook/{notebookId}/location/{locationId}/restore
	 * ROUTE restore_location
   *
	 * @param  int  $notebookId
   * @param  int  $locationId
   * @return Response
   */
  public function restore($notebookId, $locationId)
  {
    $location = Location::withTrashed()->where('id', $locationId);

    $location->restore();

    return Redirect::route('view_locations', $notebookId)
			->with('flash_success', trans('location.restored'));
  }

	/**
	 * Remove the location from storage.
	 *
	 * GET /notebook/{notebookId}/location/{locationId}/destroy
	 * ROUTE destroy_location
	 *
	 * @param  int  $notebookId
	 * @param  int  $locationId
	 * @return Response
	 */
	public function destroy($notebookId, $locationId)
	{
    Location::withTrashed()->where('id', $locationId)->forceDelete();

    return Redirect::route('view_locations', $notebookId)
			->with('flash_danger', trans('location.destroyed'));
	}

}