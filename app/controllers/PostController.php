<?php

class PostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * GET /app/posts
	 * ROUTE view_posts
	 *
	 * @return Response
	 */
	public function index()
	{
    $type = Request::get('type');

    if($type == 'trashed')
    {
      $posts = Post::onlyTrashed()->paginate(10);
    }
    else 
    {
      $posts = Post::paginate(10);
    }

    $allCount = Post::all()->count();
    $trashCount = Post::onlyTrashed()->get()->count();

		return View::make('posts.index', 
      compact('posts', 'type', 'allCount', 'trashCount'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * GET /app/posts/post/create
	 * ROUTE create_post
	 *
	 * @return Response
	 */
	public function create()
	{
    $categories = PostCategory::all();

    return View::make('posts.create', compact('categories'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * GET /app/posts/post/{postId}/edit
	 * ROUTE edit_post
	 *
	 * @param  int  $postId
	 * @return Response
	 */
	public function edit($postId)
	{
    $post = Post::findOrFail($postId);
    $categories = PostCategory::all();

    return View::make('posts.edit', compact('post', 'categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * POST /post/store
	 * ROUTE store_post
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();

		// Validation
		$validator = Validator::make($data, Post::$rules);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator->errors())
				->withInput();
		}

		// Action
		$post = Post::create($data);

		// Return
		return Redirect::route('edit_post', $post->id)
			->with('alert_info', 'Your post has been added');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * POST /post/{postId}/update
	 * ROUTE update_post
	 *
	 * @param  int  $postId
	 * @return Response
	 */
	public function update($postId)
	{
		$post = Post::findOrFail($postId);
		$data = Input::all();

		// Validation
		$validator = Validator::make($data, Post::$rules);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator->errors())
				->withInput();
		}

		// Action
		$post->update($data);

    // Return
    return Redirect::route('edit_post', $post->id)
      ->with('alert_info', 'Your post has been added');
	}

  /**
   * Put the post in trash.
	 *
   * GET /post/{postId}/trash
	 * ROUTE trash_post
   *
   * @param  int  $postId
   * @return Response
   */
  public function trash($postId)
  {
    Post::find($postId)->delete();

    return Redirect::route('view_posts')
			->with('alert_danger', 'Your post has been trashed');
  }

  /**
   * Restore the post from trash.
	 *
   * GET /post/{postId}/restore
	 * ROUTE restore_post
   *
   * @param  int  $postId
   * @return Response
   */
  public function restore($postId)
  {
    Post::withTrashed()->where('id', $postId)->restore();

    return Redirect::route('view_posts', ['type' => 'trashed'])
			->with('alert_info', 'Your post has been restored');
  }

	/**
	 * Remove the post from storage.
	 *
	 * GET /post/{postId}/destroy
	 * ROUTE destroy_post
	 *
	 * @param  int  $postId
	 * @return Response
	 */
	public function destroy($postId)
	{
    Post::withTrashed()->where('id', $postId)->forceDelete();

    return Redirect::route('view_posts', ['type' => 'trashed'])
			->with('alert_info', 'Your post has been destroyed');
	}

}