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
    'username',
    'email',
    'password',
    'remember_token',
    'activated'
  ];

  public static $rules = [
    'username' => 'required|unique:users',
    'email' => 'required|unique:users',
    'password' => 'required'
  ];

  public static $loginRules = [
    'email' => 'required|unique:users',
    'password' => 'required'
  ];

  public static $registerRules = [
    'username' => 'required|unique:users',
    'email' => 'required|unique:users',
    'password' => 'required|confirmed'
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
    return $this->hasMany('Notebook');
  }
  public function novels()
  {
    return $this->hasMany('Novel');
  }
  public function entries()
  {
    return $this->hasMany('Entry');
  }

}
