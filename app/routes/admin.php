<?php

/*
 * Report Routes
 */
Route::get( 'admin/reports', [
  'as' => 'view_reports',
  'uses' => 'AdminController@reports'
]);


Route::get( 'admin/reports/userlist', [
  'as' => 'view_userlist',
  'uses' => 'AdminController@user_list'
]);

Route::get( 'admin/reports/sessions', [
  'as' => 'view_sessions',
  'uses' => 'AdminController@sessions'
]);



/*
 * Setting Routes
 */
Route::get( 'admin/settings', [
  'as' => 'view_settings',
  'uses' => 'AdminController@settings'
]);



Route::get( 'admin/settings/character_types', [
  'as' => 'view_character_types',
  'uses' => 'CharacterTypeController@index'
]);
Route::post( 'admin/settings/character_types/store', [
  'as' => 'store_character_type',
  'uses' => 'CharacterTypeController@store'
]);
Route::put( 'admin/settings/character_types/{characterTypeId}/update', [
  'as' => 'update_character_type',
  'uses' => 'CharacterTypeController@update'
]);