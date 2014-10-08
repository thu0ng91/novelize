<?php

/*
 * Profile Routes
 */
Route::get( '/profile/{userId}', [
  'as' => 'view_profile',
  'uses' => 'AccountController@profile'
]);


Route::put( 'account/{userId}/update', [
  'as' => 'update_account',
  'uses' => 'AccountController@updateAccount'
]);
Route::put( 'password/{userId}/update', [
  'as' => 'change_password',
  'uses' => 'AccountController@changePassword'
]);

/*
 * Contact Routes
 */
Route::get( '/contact/{userId}/{type}', [
  'as' => 'view_contact',
  'uses' => 'AccountController@contact'
]);