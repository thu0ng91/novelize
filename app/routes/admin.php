<?php

/*
 * Profile Routes
 */
Route::get( '/reports', [
  'as' => 'view_reports',
  'uses' => 'AdminController@reports'
]);