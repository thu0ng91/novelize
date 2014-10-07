<?php

class SceneController extends \BaseController {

  /**
   * Show the form for creating a new resource.
   *
   * GET /novel/{novelId}/scene/create
   * ROUTE create_scene
   *
   * @param  int  $novelId
   * @return Response
   */
  public function create($novelId)
  {
    $novel = Novel::findOrFail($novelId);

    return View::make('scenes.create', compact('novel'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * POST /novel/store
   * ROUTE store_novel
   *
   * @return Response
   */
  public function store($novelId, $sectionOrder)
  {
  }

  /**
   * Update the specified resource in storage.
   *
   * POST novel/{novelId}/scene/{sceneId}/update
   * ROUTE update_scene
   *
   * @param  int  $novelId
   * @param  int  $sceneId
   * @return Response
   */
  public function update($novelId, $sceneId)
  {
    $scene = Scene::findOrFail($sceneId);
    $data = Input::all();

    // Validation
    $validator = Validator::make($data, Scene::$rules);

    if ($validator->fails())
    {
      return Redirect::back()
        ->withErrors($validator->errors())
        ->withInput();
    }

    // Action
    $scene->update($data);

    // Return
    return Redirect::route('write_novel', [$novelId, $sceneId])
      ->with('alert_success', 'Scene has been updated');
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
    NovelSection::find($novelId)->delete();

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
    NovelSection::withTrashed()->where('id', $novelId)->restore();

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
    NovelSection::withTrashed()->where('id', $novelId)->forceDelete();

    return Redirect::route('view_novels', ['type' => 'trashed'])
      ->with('alert_success', 'novel has been destroyed');
  }

}