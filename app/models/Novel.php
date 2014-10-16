<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Novel extends \Eloquent {

  use SoftDeletingTrait;

  /**
   * Which fields may be mass assigned
   *
   * @var array
   */
  protected $fillable = [
    'owner_id',
    'notebook_id',
    'genre_id',
    'title',
    'subtitle',
    'author',
    'description',
    'public',
  ];

  public static $rules = [
    'title' => 'required',
    'notebook_id' => 'required',
    'genre_id' => 'required'
  ];

  public function user()
  {
    return $this->belongsTo('User');
  }

  public function genre()
  {
    return $this->belongsTo('Genre');
  }

  public function notebook()
  {
    return $this->belongsTo('Notebook');
  }

  public function chapters()
  {
    return $this->hasMany('Chapter')->orderBy('chapter_order', 'asc');
  }

  public function scenes()
  {
    return $this->hasManyThrough('Scene', 'Chapter')->orderBy('scene_order', 'asc');
  }

  public function word_count($novelId)
  {
    $novel = Novel::with('scenes')->findOrFail($novelId);

    $scenes_text = '';

    foreach($novel->scenes as $scene) {
      $scenes_text .= $scene->body;
    }

    $scenes_text = strip_tags($scenes_text);

    $word_count = str_word_count($scenes_text);

    $word_count = number_format($word_count);

    return $word_count;
  }

}