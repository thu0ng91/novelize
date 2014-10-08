<?php

/*
 * View Routes
 */
Route::get( '/notebook/{notebookId}/items', [
    'as' => 'view_items',
    'uses' => 'ItemController@index'
]);
Route::get( '/notebook/{notebookId}/item/create', [
    'as' => 'create_item',
    'uses' => 'ItemController@create'
]);
Route::get( '/notebook/{notebookId}/item/{itemId}/edit', [
    'as' => 'edit_item',
    'uses' => 'ItemController@edit'
]);

/*
 * Action Routes
 */
Route::post( '/notebook/{notebookId}/item/store', [
    'as' => 'store_item',
    'uses' => 'ItemController@store'
]);
Route::put( '/notebook/{notebookId}/item/{itemId}/update', [
    'as' => 'update_item',
    'uses' => 'ItemController@update'
]);

/*
 * Delete Routes
 */
Route::get( '/notebook/{notebookId}/item/{itemId}/trash', [
    'as' => 'trash_item',
    'uses' => 'ItemController@trash'
]);
Route::get( '/notebook/{notebookId}/item/{itemId}/restore', [
    'as' => 'restore_item',
    'uses' => 'ItemController@restore'
]);
Route::get( '/notebook/{notebookId}/item/{itemId}/destroy', [
    'as' => 'destroy_item',
    'uses' => 'ItemController@destroy'
]);