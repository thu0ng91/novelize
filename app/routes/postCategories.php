<?php

/*
 * View Routes
 */
Route::get( 'postCategories', [
    'as' => 'view_postCategories',
    'uses' => 'PostCategoryController@index'
]);
Route::get( '/postCategory/create', [
    'as' => 'create_postCategory',
    'uses' => 'PostCategoryController@create'
]);
Route::get( '/postCategory/{postCategoryId}/edit', [
    'as' => 'edit_postCategory',
    'uses' => 'PostCategoryController@edit'
]);

/*
 * Action Routes
 */
Route::post( 'postCategory/store', [
    'as' => 'store_postCategory',
    'uses' => 'PostCategoryController@store'
]);
Route::put( 'postCategory/{postCategoryId}/update', [
    'as' => 'update_postCategory',
    'uses' => 'PostCategoryController@update'
]);

/*
 * Delete Routes
 */
Route::get( 'postCategory/{postCategoryId}/delete', [
    'as' => 'delete_postCategory',
    'uses' => 'PostCategoryController@delete'
]);