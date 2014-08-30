<?php

class PostCategoryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * GET /app/categories
	 * ROUTE view_categories
	 *
	 * @return Response
	 */
	public function index()
	{
    $categories = PostCategory::all();

		return View::make('postCategories.index', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * GET /app/categories/category/create
	 * ROUTE create_category
	 *
	 * @return Response
	 */
	public function create()
	{
    return View::make('postCategories.create');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * GET /app/categories/category/{categoryId}/edit
	 * ROUTE edit_category
	 *
	 * @param  int  $categoryId
	 * @return Response
	 */
	public function edit($categoryId)
	{
    $category = PostCategory::findOrFail($categoryId);

    return View::make('postCategories.edit', compact('category'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * POST /category/store
	 * ROUTE store_category
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();

		// Validation
		$validator = Validator::make($data, PostCategory::$rules);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator->errors())
				->withInput();
		}

		// Action
		$category = PostCategory::create($data);

		// Return
		return Redirect::route('edit_postCategory', $category->id)
			->with('alert_info', 'Your category has been added');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * POST /category/{categoryId}/update
	 * ROUTE update_category
	 *
	 * @param  int  $categoryId
	 * @return Response
	 */
	public function update($categoryId)
	{
		$category = PostCategory::findOrFail($categoryId);
		$data = Input::all();

		// Validation
		$validator = Validator::make($data, PostCategory::$rules);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator->errors())
				->withInput();
		}

		// Action
		$category->update($data);

    // Return
    return Redirect::route('edit_postCategory', $category->id)
      ->with('alert_info', 'Your category has been updated');
	}

  /**
   * Remove the category from storage.
	 *
   * GET /category/{categoryId}/trash
	 * ROUTE trash_category
   *
   * @param  int  $categoryId
   * @return Response
   */
  public function delete($categoryId)
  {
    PostCategory::find($categoryId)->delete();

    return Redirect::route('view_postCategories')
			->with('alert_danger', 'Your category has been deleted');
  }

}