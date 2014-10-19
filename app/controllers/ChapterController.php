<?php

class ChapterController extends \BaseController {

  public function __construct()
  {
    $this->beforeFilter('auth');
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
      ->with('flash_success', trans('chapter.stored'));
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
      ->with('flash_success', trans('chapter.updated'));
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
      ->with('alert_danger', trans('chapter.last_chapter'));
    }

    $chapter = Chapter::with('scenes')->findOrFail($chapterId);

    $sceneId = $chapter->scenes->first()['id'];

    if( $chapter->scenes->count() > 0 )
    {
      return Redirect::route('write_novel', [$novel->id, $sceneId])
      ->with('alert_danger', trans('chapter.delete_scenes'));
    }

    Chapter::find($chapterId)->delete();

    return Redirect::route('write_novel', [$novel->id, $novel->scenes->first()['id']])
      ->with('alert_danger', trans('chapter.trashed', ['route' => route('restore_chapter', [$novelId, $chapterId])]));
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
  public function restore($novelId, $chapterId)
  {
    $novel = Novel::with('scenes')->findOrFail($novelId);

    Chapter::withTrashed()->where('id', $chapterId)->restore();

    return Redirect::route('write_novel', [$novel->id, $novel->scenes->first()['id']] )
      ->with('flash_success', trans('chapter.restored'));
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
      ->with('flash_danger', trans('chapter.destroyed'));
  }

}