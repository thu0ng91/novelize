<?php

class NovelSectionController extends \BaseController {

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
    // Add 1 to all section orders below new section
    $sections = DB::table('novel_sections')
      ->where('novel_id', '=', $novelId)
      ->where('section_order', '>', $sectionOrder)
      ->get();


    foreach ($sections as $section) 
    {
      $currentSectionOrder = $section->section_order;
      $newSectionOrder = $currentSectionOrder + 1;

      $section = NovelSection::findOrFail($section->id);

      $section->section_order = $newSectionOrder;
      $section->save();
    }

    // Get new section order
    $newSectionOrder = $sectionOrder + 1;

    // New section data
    $data = [
      'novel_id' => $novelId,
      'section_order' => $newSectionOrder,
      'title' => '',
      'body' => 'New Section',
      'description' => ''
    ];

    // Action
    NovelSection::create($data);

    // URL
    $url = URL::route('write_novel', $novelId) . '#section' . $newSectionOrder;

    // Return
    return Redirect::to($url)
      ->with('alert_success', 'New section has been added');
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