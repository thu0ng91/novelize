<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Profile extends \Eloquent {

  use SoftDeletingTrait;

	protected $fillable = [
    'first_name',
    'last_name'
  ];

  public static $rules = [
    
  ];

  public function users()
  {
    return $this->hasMany('User');
  }
}