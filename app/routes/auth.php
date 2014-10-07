<?php

/*
 * Auth Routes
 */
Route::get( '/register', [
  'as' => 'register_page',
  'uses' => 'AuthController@getRegister'
]);
Route::get( '/login', [
  'as' => 'login_page',
  'uses' => 'AuthController@getLogin'
]);


// Reminder Routes
Route::get( '/login/remind', [
  'as' => 'remind_page',
  'uses' => 'RemindersController@getRemind'
]);
Route::get( '/login/reset', [
  'as' => 'reset_page',
  'uses' => 'RemindersController@getReset'
]);

Route::post( '/login/remind', [
  'as' => 'post_remind',
  'uses' => 'RemindersController@postRemind'
]);
Route::post( '/login/reset', [
  'as' => 'post_reset',
  'uses' => 'RemindersController@postReset'
]);