<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends \Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SoftDeletingTrait;

  /**
   * Which fields may be mass assigned
   *
   * @var array
   */
  protected $fillable = [
    'role_id',
    'profile_id',
    'email',
    'password',
    'first_name',
    'last_name',
    'remember_token'
  ];

  public static $rulesStore = [
    'email' => 'required|email|unique:users',
    'password' => 'required|min:8'
  ];

  public static $rulesRegister = [
    'email' => 'required|email|unique:users',
    'password' => 'required|confirmed|min:8',
    'first_name' => 'required',
    'last_name' => 'required'
  ];

  public static $rulesLogin = [
    'email' => 'required|email',
    'password' => 'required'
  ];

  public static $rulesUpdate = [
    'email' => 'required|email'
  ];


  public static $rulesUpdateAccount = [
    'email' => 'required|email',
    'first_name' => 'required',
    'last_name' => 'required'
  ];
  public static $rulesUpdateAccountUnique = [
    'email' => 'required|email|unique:users',
    'first_name' => 'required',
    'last_name' => 'required'
  ];


  public static $rulesChangePassword = [
    'password' => 'required',
    'newPassword' => 'required|confirmed'
  ];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

  /**
   * Passwords must always be hashed
   *
   * @param $password
   */
  public function setPasswordAttribute($password)
  {
      $this->attributes['password'] = Hash::make($password);
  }

  /**
   * Establish relationship with roles
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
  public function role()
  {
    return $this->belongsTo('Role');
  }
  public function profile()
  {
    return $this->belongsTo('Profile');
  }


  public function notebooks()
  {
    return $this->hasMany('Notebook', 'owner_id', 'id');
  }


  public function novels()
  {
    return $this->hasMany('Novel', 'owner_id', 'id');
  }


  public function entries()
  {
    return $this->hasMany('Entry', 'owner_id', 'id');
  }

}
