<?php

class Role extends \Eloquent {

  public $timestamps = false;

	protected $fillable = [
    'name', 
    'description'
  ];

  public static $rules = [
    'name' => 'required|unique:roles'
  ];

  public function users()
  {
    return $this->hasMany('User');
  }
}