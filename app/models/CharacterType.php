<?php

class CharacterType extends \Eloquent {

  public $timestamps = false;

  protected $fillable = [
    'name',
    'description'
  ];

  public static $rules = [
    'name' => 'required|unique:character_types'
  ];

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'character_types';

  public function characters()
  {
    return $this->hasMany('Character');
  }

}