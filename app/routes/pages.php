<?php

/*
 * View Routes
 */
Route::get( '/index', [
  'as' => 'index_page',
  'uses' => 'PagesController@getIndex'
]);
Route::get( '/contact', [
  'as' => 'contact_page',
  'uses' => 'PagesController@getContact'
]);

Route::get( '/register', [
  'as' => 'register_page',
  'uses' => 'PagesController@getRegister'
]);
Route::get( '/login', [
  'as' => 'login_page',
  'uses' => 'PagesController@getLogin'
]);

Route::get( '/privacy', [
  'as' => 'privacy_page',
  'uses' => 'PagesController@getPrivacy'
]);
Route::get( '/terms', [
  'as' => 'terms_page',
  'uses' => 'PagesController@getTerms'
]);