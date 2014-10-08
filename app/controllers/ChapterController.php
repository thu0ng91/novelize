<?php

class ChapterController extends \BaseController {

  /**
   * Show the form for creating a new resource.
   *
   * GET /novel/{novelId}/chapter/create
   * ROUTE create_chapter
   *
   * @param  int  $novelId
   * @return Response
   */
  public function create($novelId)
  {
    $novel = Novel::findOrFail($novelId);

    return View::make('chapters.create', compact('novel'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * POST novel/{novelId}/chapter/store
   * ROUTE store_chapter
   *
   * @param  int  $novelId
   * @return Response
   */
  public function store($novelId)
  {
    $novel = Novel::with('chapters')->findOrFail($novelId);

    $chapter_order = $novel->chapters->last()['chapter_order'] + 1;

    $chapter_data = [
      'novel_id' => $novel->id,
      'chapter_order' => $chapter_order
    ];

    // Create Chapter
    $chapter = Chapter::create($chapter_data);

    $scene_data = [
      'chapter_id' => $chapter->id,
      'scene_order' => 1
    ];

    // Create First Scene
    $scene = Scene::create($scene_data);

    // Return
    return Redirect::route('write_novel', [$novelId, $scene->id])
      ->with('flash_success', 'Chapter has been created');
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
    $novel = NovelSection::findOrFail($novelId);
    $data = Input::all();

    // Validation
    $validator = Validator::make($data, NovelSection::$rules);

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
  public function trash($novelId, $chapterId)
  {
    $novel = Novel::with('chapters', 'scenes')->findOrFail($novelId);

    $sceneId = $novel->scenes->first()['id'];

    if( $novel->chapters->count() == 1 )
    {
      return Redirect::route('write_novel', [$novel->id, $sceneId])
      ->with('alert_danger', 'This is the last chapter of the novel and can\'t be deleted.');
    }

    $chapter = Chapter::with('scenes')->findOrFail($chapterId);

    $sceneId = $chapter->scenes->first()['id'];

    if( $chapter->scenes->count() > 0 )
    {
      return Redirect::route('write_novel', [$novel->id, $sceneId])
      ->with('alert_danger', 'Please delete all the scenes for this chapter before deleting the chapter');
    }

    Chapter::find($chapterId)->delete();

    return Redirect::route('write_novel', [$novel->id, $novel->scenes->first()['id']])
      ->with('alert_success', 'Chapter has been trashed');
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