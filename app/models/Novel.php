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
    'author' => 'required'
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

}