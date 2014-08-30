<?php

/*
 * Login Routes
 */
Route::post('login', [
  'as' => 'login',
  'uses' => 'SessionsController@store'
]);

/*
 * Logout Routes
 */
Route::get( 'logout', [
  'as' => 'logout',
  'uses' => 'SessionsController@destroy'
]);