<?php

class GenreController extends \BaseController {

  public function __construct()
  {
    $this->beforeFilter('auth');
  }

	/**
	 * Display a listing of the resource.
	 *
	 * GET /admin/settings/genres
	 * ROUTE view_genres
	 *
	 * @return Response
	 */
	public function index()
	{
    $genres = Genre::all();

		return View::make('admin.genres', compact('genres'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * POST /admin/settings/genres/store
	 * ROUTE store_character_type
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();

		// Validation
		$validator = Validator::make($data, Genre::$rules);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator->errors())
				->withInput();
		}

		// Action
		Genre::create($data);

		// Return
		return Redirect::route('view_genres')
			->with('flash_success', trans('genre.stored'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * PUT /admin/settings/genres/{genreId}/update
	 * ROUTE update_character_type
	 *
	 * @param  int  $genreId
	 * @return Response
	 */
	public function update($genreId)
	{
		$genre = Genre::findOrFail($genreId);

		$data = Input::all();

		// Validation
		$validator = Validator::make($data, Genre::$rules);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator->errors())
				->withInput();
		}

		// Action
		$genre->update($data);

		// Return
		return Redirect::route('view_genres')
			->with('flash_success', trans('genre.updated'));
	}

}