<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Profile extends \Eloquent {

  use SoftDeletingTrait;

	protected $fillable = [
    'bio',
    'notify_updates',
    'newsletter_member'
  ];

  public static $rulesProfile = [];

  public function user()
  {
    return $this->hasOne('User');
  }
}