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
    'username' => 'required|alpha_dash|min:7',
    'email' => 'required|email',
  ];

  public static $rulesAccountUniqueUser = [
    'username' => 'required|alpha_dash|min:7|unique:users',
    'email' => 'required|email',
  ];

  public static $rulesAccountUniqueEmail = [
    'username' => 'required|alpha_dash|min:7',
    'email' => 'required|email|unique:users',
  ];

  public static $rulesAccountUnique = [
    'username' => 'required|alpha_dash|min:7|unique:users',
    'email' => 'required|email|unique:users',
  ];



  public static $rulesPassword = [
    'password' => 'required',
    'newPassword' => 'sometimes|confirmed|min:8'
  ];



  public static $rulesProfile = [];



  public function user()
  {
    return $this->hasOne('User');
  }
}