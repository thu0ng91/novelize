<?php

/*
 * Report Routes
 */
Route::get( '/reports', [
  'as' => 'view_reports',
  'uses' => 'AdminController@reports'
]);

Route::get( '/reports/sessions', [
  'as' => 'view_sessions',
  'uses' => 'AdminController@sessions'
]);