<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Scene extends \Eloquent {

  use SoftDeletingTrait;

  /**
   * Which fields may be mass assigned
   *
   * @var array
   */
  protected $fillable = [
    'chapter_id',
    'scene_order',
    'title',
    'body',
    'description'
  ];

  public static $rules = [
    'scene_order' => 'required'
  ];

  /**
   * Belongs to relationships
   */
  public function chapter()
  {
    return $this->belongsTo('Chapter');
  }

}