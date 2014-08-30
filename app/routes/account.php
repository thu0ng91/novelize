<?php

/*
 * Profile Routes
 */
Route::get( 'app/profile/{userId}', [
  'as' => 'view_profile',
  'uses' => 'AccountController@profile'
]);


Route::put( 'account/{userId}/update', [
  'as' => 'update_account',
  'uses' => 'ProfileController@updateAccount'
]);
Route::put( 'password/{userId}/update', [
  'as' => 'change_password',
  'uses' => 'ProfileController@changePassword'
]);
Route::put( 'profile/{profileId}/update', [
  'as' => 'update_profile',
  'uses' => 'ProfileController@updateProfile'
]);

/*
 * Support Routes
 */
Route::get( 'app/support/{userId}', [
  'as' => 'view_support',
  'uses' => 'AccountController@support'
]);