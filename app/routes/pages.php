<?php

/*
 * Main Routes
 */
Route::get( '/index', [
  'as' => 'index_page',
  'uses' => 'PagesController@getIndex'
]);
Route::get( '/contact', [
  'as' => 'contact_page',
  'uses' => 'PagesController@getContact'
]);
Route::get( '/story', [
  'as' => 'story_page',
  'uses' => 'PagesController@getStory'
]);
Route::get( '/blog', [
  'as' => 'blog_page',
  'uses' => 'PagesController@getBlog'
]);
Route::get( '/blog/post/{postId}', [
  'as' => 'post_page',
  'uses' => 'PagesController@getPost'
]);

/*
 * Auth Routes
 */
Route::get( '/register', [
  'as' => 'register_page',
  'uses' => 'PagesController@getRegister'
]);
Route::get( '/message', [
  'as' => 'authMessage_page',
  'uses' => 'PagesController@getAuthMessage'
]);
Route::get( '/login', [
  'as' => 'login_page',
  'uses' => 'PagesController@getLogin'
]);

/*
 * Secondary Routes
 */
Route::get( '/legal', [
  'as' => 'legal_page',
  'uses' => 'PagesController@getLegal'
]);