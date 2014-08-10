<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Notebook extends \Eloquent {

  use SoftDeletingTrait;

  /**
   * Which fields may be mass assigned
   *
   * @var array
   */
  protected $fillable = [
    'owner_id',
    'name',
    'description'
  ];

  public static $rules = [
    'name' => 'required'
  ];

  public function user()
  {
    return $this->belongsTo('User');
  }

  public function novels()
  {
    return $this->hasMany('Novel');
  }
  public function characters()
  {
    return $this->hasMany('Character');
  }
  public function locations()
  {
    return $this->hasMany('Location');
  }
  public function items()
  {
    return $this->hasMany('Item');
  }
  public function notes()
  {
    return $this->hasMany('Note');
  }

} 