<?php

class Genre extends \Eloquent {

  public $timestamps = false;

	protected $fillable = [
    'name',
    'description',
    'image_path'
  ];

  public static $rules = [
    'name' => 'required|unique:genres'
  ];

  public function novels()
  {
    return $this->hasMany('Novel');
  }

}