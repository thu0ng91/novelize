<?php

/*
 * View Routes
 */
Route::get( '/users', [
  'as' => 'view_users',
  'uses' => 'UserController@index'
]);
Route::get( '/user/create', [
  'as' => 'create_user',
  'uses' => 'UserController@create'
]);
Route::get( '/user/{userId}/show', [
  'as' => 'show_user',
  'uses' => 'UserController@show'
]);
Route::get( '/user/{userId}/edit', [
  'as' => 'edit_user',
  'uses' => 'UserController@edit'
]);

/*
 * Action Routes
 */
Route::post( 'user/store', [
  'as' => 'store_user',
  'uses' => 'UserController@store'
]);
Route::post( 'user/register', [
  'as' => 'register_user',
  'uses' => 'UserController@register'
]);
Route::put( 'user/{userId}/update', [
  'as' => 'update_user',
  'uses' => 'UserController@update'
]);

/*
 * Delete Routes
 */
Route::get( 'user/{userId}/trash', [
  'as' => 'trash_user',
  'uses' => 'UserController@trash'
]);
Route::get( 'user/{userId}/restore', [
  'as' => 'restore_user',
  'uses' => 'UserController@restore'
]);
Route::get( 'user/{userId}/destroy', [
  'as' => 'destroy_user',
  'uses' => 'UserController@destroy'
]);
