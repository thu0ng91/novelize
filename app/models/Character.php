<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Character extends \Eloquent {

  use SoftDeletingTrait;

  /**
   * Which fields may be mass assigned
   *
   * @var array
   */
  protected $fillable = [
    'notebook_id',
    'name',
    'description',
    'date_of_birth',
    'eye_color',
    'hair_color',
    'skin_color'
  ];

  public static $rules = [
    'name' => 'required'
  ];

  public function notebook()
  {
    return $this->belongsTo('Notebook');
  }

} 