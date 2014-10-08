<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Profile extends \Eloquent {

  use SoftDeletingTrait;

	protected $fillable = [
    'first_name',
    'last_name',
    'bio',
    'notify_updates',
    'newsletter_memeber'
  ];

  public static $rulesAccount = [
    'email' => 'required|email',
  ];

  public static $rulesAccountUniqueEmail = [
    'email' => 'required|email|unique:users',
  ];

  public static $rulesPassword = [
    'password' => 'required',
    'newPassword' => 'required|confirmed|min:8'
  ];



  public static $rulesProfile = [];



  public function user()
  {
    return $this->hasOne('User');
  }
}