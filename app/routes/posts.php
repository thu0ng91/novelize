<?php

/*
 * View Routes
 */
Route::get( 'posts', [
    'as' => 'view_posts',
    'uses' => 'PostController@index'
]);
Route::get( '/post/create', [
    'as' => 'create_post',
    'uses' => 'PostController@create'
]);
Route::get( '/post/{postId}/edit', [
    'as' => 'edit_post',
    'uses' => 'PostController@edit'
]);

/*
 * Action Routes
 */
Route::post( 'post/store', [
    'as' => 'store_post',
    'uses' => 'PostController@store'
]);
Route::put( 'post/{postId}/update', [
    'as' => 'update_post',
    'uses' => 'PostController@update'
]);

/*
 * Delete Routes
 */
Route::get( 'post/{postId}/trash', [
    'as' => 'trash_post',
    'uses' => 'PostController@trash'
]);
Route::get( 'post/{postId}/restore', [
    'as' => 'restore_post',
    'uses' => 'PostController@restore'
]);
Route::get( 'post/{postId}/destroy', [
    'as' => 'destroy_post',
    'uses' => 'PostController@destroy'
]);