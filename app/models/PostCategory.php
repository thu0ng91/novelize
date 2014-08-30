<?php

class PostCategory extends \Eloquent {

  public $timestamps = false;

  /**
   * Which fields may be mass assigned
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'description',
  ];

  public static $rules = [
    'name' => 'required'
  ];

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'post_categories';

  public function posts()
  {
    return $this->hasMany('Post');
  }

} 