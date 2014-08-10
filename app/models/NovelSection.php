<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class NovelSection extends \Eloquent {

  use SoftDeletingTrait;

  /**
   * Which fields may be mass assigned
   *
   * @var array
   */
  protected $fillable = [
    'novel_id',
    'section_order',
    'title',
    'body',
    'description'
  ];

  public static $rules = [
    'section_order' => 'required'
  ];

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'novel_sections';

  /**
   * Belongs to relationships
   */
  public function novel()
  {
    return $this->belongsTo('Novel');
  }

} 