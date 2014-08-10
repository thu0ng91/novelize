<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Item extends \Eloquent {

  use SoftDeletingTrait;

  /**
   * Which fields may be mass assigned
   *
   * @var array
   */
  protected $fillable = [
    'notebook_id',
    'name',
    'description'
  ];

  public static $rules = [
    'name' => 'required'
  ];

  public function notebook()
  {
    return $this->belongsTo('Notebook');
  }

} 