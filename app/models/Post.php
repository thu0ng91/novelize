<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Post extends \Eloquent {

  use SoftDeletingTrait;

  /**
   * Which fields may be mass assigned
   *
   * @var array
   */
  protected $fillable = [
    'title',
    'body',
    'category_id'
  ];

  public static $rules = [
    'title' => 'required'
  ];

  public function category()
  {
    return $this->belongsTo('PostCategory');
  }

} 