<?php

class SceneController extends \BaseController {

  /**
   * Show the form for creating a new resource.
   *
   * GET /novel/{novelId}/chapter/{chapterId}/scene/create
   * ROUTE create_scene
   *
   * @param  int  $novelId
   * @return Response
   */
  public function create($novelId, $chapterId)
  {
    $novel = Novel::findOrFail($novelId);
    $chapter = Chapter::with('scenes')->findOrFail($chapterId);

    return View::make('scenes.create', compact('novel', 'chapter'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * POST novel/{novelId}/chapter/{chapterId}/scene/store
   * ROUTE store_scene
   *
   * @return Response
   */
  public function store($novelId, $chapterId)
  {
    $chapter = Chapter::with('scenes')->findOrFail($chapterId);
    $scene_order = $chapter->scenes->last()['scene_order'] + 1;

    $data = [
      'chapter_id' => $chapter->id,
      'scene_order' => $scene_order
    ];

    // Action
    $scene = Scene::create($data);

    // Return
    return Redirect::route('write_novel', [$novelId, $scene->id])
      ->with('flash_success', 'Scene has been created');
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
  public function trash($novelId, $sceneId)
  {
    $novel = Novel::with('scenes')->findOrFail($novelId);

    if( $novel->scenes->count() == 1 )
    {
      return Redirect::route('write_novel', [$novel->id, $sceneId])
      ->with('alert_danger', 'This is the last scene of the novel and can\'t be deleted.');
    }

    Scene::find($sceneId)->delete();

    return Redirect::route('write_novel', [$novel->id, $novel->scenes->first()['id']])
      ->with('alert_success', 'scene has been trashed');
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
  public function restore($novelId, $sceneId)
  {
    $novel = Novel::with('scenes')->findOrFail($novelId);

    Scene::withTrashed()->where('id', $sceneId)->restore();

    return Redirect::route('write_novel', [$novel->id, $novel->scenes->first()['id']])
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
  public function destroy($novelId, $sceneId)
  {
    $novel = Novel::with('scenes')->findOrFail($novelId);

    Scene::withTrashed()->where('id', $sceneId)->forceDelete();

    return Redirect::route('write_novel', [$novel->id, $novel->scenes->first()['id']])
      ->with('alert_success', 'novel has been destroyed');
  }

}