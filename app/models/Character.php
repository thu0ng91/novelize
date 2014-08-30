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
    'type_id',
    'name',
    'description',
    'height',
    'weight',
    'eyes',
    'hair',
    'skin',
    'date_of_birth',
    'place_of_birth',
    'hobbies',
    'mannerisms',
    'education',
    'occupation',
  ];

  public static $rules = [
    'name' => 'required'
  ];

  public function notebook()
  {
    return $this->belongsTo('Notebook');
  }

} 