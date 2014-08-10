<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Entry extends \Eloquent {

  use SoftDeletingTrait;

  /**
   * Which fields may be mass assigned
   *
   * @var array
   */
  protected $fillable = [
    'owner_id',
    'title',
    'body'
  ];

  public static $rules = [
    'title' => 'required'
  ];

  public function owner()
  {
    return $this->belongsTo('User');
  }

} 