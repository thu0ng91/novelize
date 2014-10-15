<?php

/*
 * Welcome Routes
 */
Route::get( '/welcome', [
  'as' => 'view_welcome',
  'uses' => 'AccountController@welcome'
]);

/*
 * Profile Routes
 */
Route::get( '/profile', [
  'as' => 'view_profile',
  'uses' => 'AccountController@profile'
]);


Route::put( 'account/update', [
  'as' => 'update_account',
  'uses' => 'AccountController@updateAccount'
]);
Route::put( 'password/update', [
  'as' => 'change_password',
  'uses' => 'AccountController@changePassword'
]);

/*
 * Contact Routes
 */
Route::get( '/contact/{type}', [
  'as' => 'view_contact',
  'uses' => 'AccountController@contact'
]);