<?php

class ItemController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * GET /notebook/{notebookId}/items
	 * ROUTE view_items
	 *
	 * @param  int  $notebookId
	 * @return Response
	 */
	public function index($notebookId)
	{
    $type = Request::get('type');

    if($type == 'trashed')
    {
      $items = Item::where('notebook_id', '=', $notebookId)
        ->onlyTrashed()
        ->paginate(10);
    }
    else
    {
      $items = Item::where('notebook_id', '=', $notebookId)
      	->orderBy('name', 'ASC')
        ->paginate(10);
    }

    $notebook = Notebook::with('characters', 'locations', 'items', 'notes')->findOrFail($notebookId);

    $allCount = Item::all()->count();
    $trashCount = Item::onlyTrashed()->get()->count();

		return View::make('items.index',
      compact('items', 'notebook', 'type', 'allCount', 'trashCount'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * GET /notebook/{notebookId}/item/create
	 * ROUTE create_item
	 *
	 * @param  int  $notebookId
	 * @return Response
	 */
	public function create($notebookId)
	{
    $notebook = Notebook::findOrFail($notebookId);

    return View::make('items.create', compact('notebook'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * GET /notebook/{notebookId}/item/{itemId}/edit
	 * ROUTE edit_item
	 *
	 * @param  int  $notebookId
	 * @param  int  $itemId
	 * @return Response
	 */
	public function edit($notebookId, $itemId)
	{
    $notebook = Notebook::findOrFail($notebookId);

    $item = Item::findOrFail($itemId);

    return View::make('items.edit', compact('notebook', 'item'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * POST /notebook/{notebookId}/item/store
	 * ROUTE store_item
	 *
	 * @param  int  $notebookId
	 * @return Response
	 */
	public function store($notebookId)
	{
		$data = Input::all();

		// Validation
		$validator = Validator::make($data, Item::$rules);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator->errors())
				->withInput();
		}

		// Add to $data
    $data = array_add($data, 'notebook_id', $notebookId);

		// Action
		$item = Item::create($data);

		// Return
		return Redirect::route('edit_item', [$notebookId, $item->id])
			->with('flash_success', trans('item.stored'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * PUT /notebook/{notebookId}/item/{itemId}/update
	 * ROUTE update_item
	 *
	 * @param  int  $notebookId
	 * @param  int  $itemId
	 * @return Response
	 */
	public function update($notebookId, $itemId)
	{
		$item = Item::findOrFail($itemId);

		$data = Input::all();

		// Validation
		$validator = Validator::make($data, Item::$rules);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator->errors())
				->withInput();
		}

		// Action
		$item->update($data);

		// Return
		return Redirect::route('edit_item', [$notebookId, $itemId])
			->with('flash_success', trans('item.updated'));
	}

  /**
   * Put the item in trash.
	 *
   * GET /notebook/{notebookId}/item/{itemId}/trash
	 * ROUTE trash_item
   *
	 * @param  int  $notebookId
   * @param  int  $itemId
   * @return Response
   */
  public function trash($notebookId, $itemId)
  {
    $item = Item::find($itemId);

    $item->delete();

    return Redirect::route('view_items', $notebookId)
			->with('alert_danger', trans('item.trashed', ['route' => route('restore_item', [$notebookId, $itemId])]));
  }

  /**
   * Restore the item from trash.
	 *
   * GET /notebook/{notebookId}/item/{itemId}/restore
	 * ROUTE restore_item
   *
	 * @param  int  $notebookId
   * @param  int  $itemId
   * @return Response
   */
  public function restore($notebookId, $itemId)
  {
    $item = Item::withTrashed()->where('id', $itemId);

    $item->restore();

    return Redirect::route('view_items', $notebookId)
			->with('flash_success', trans('item.restored'));
  }

	/**
	 * Remove the item from storage.
	 *
	 * GET /notebook/{notebookId}/item/{itemId}/destroy
	 * ROUTE destroy_item
	 *
	 * @param  int  $notebookId
	 * @param  int  $itemId
	 * @return Response
	 */
	public function destroy($notebookId, $itemId)
	{
    Item::withTrashed()->where('id', $itemId)->forceDelete();

    return Redirect::route('view_items', $notebookId)
			->with('flash_danger', trans('item.destroyed'));
	}

}