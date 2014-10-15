<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class UserSession extends \Eloquent {

	protected $table = 'sessions';

	protected $fillable = [
    'session_type',
    'user_id',
    'email_address',
  ];
}