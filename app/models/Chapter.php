<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Chapter extends \Eloquent {

  use SoftDeletingTrait;

  /**
   * Which fields may be mass assigned
   *
   * @var array
   */
  protected $fillable = [
    'novel_id',
    'chapter_order',
    'title'
  ];

  public static $rules = [
    'chapter_order' => 'required',
    'title' => 'required'
  ];

  /**
   * Belongs to relationships
   */
  public function novel()
  {
    return $this->belongsTo('Novel');
  }

  public function scenes()
  {
    return $this->hasMany('Scene')->orderBy('scene_order', 'asc');
  }

}