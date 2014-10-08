<?php

/*
 * View Routes
 */
Route::get( '/notebook/{notebookId}/locations', [
    'as' => 'view_locations',
    'uses' => 'LocationController@index'
]);
Route::get( '/notebook/{notebookId}/location/create', [
    'as' => 'create_location',
    'uses' => 'LocationController@create'
]);
Route::get( '/notebook/{notebookId}/location/{locationId}/edit', [
    'as' => 'edit_location',
    'uses' => 'LocationController@edit'
]);

/*
 * Action Routes
 */
Route::post( '/notebook/{notebookId}/location/store', [
    'as' => 'store_location',
    'uses' => 'LocationController@store'
]);
Route::put( '/notebook/{notebookId}/location/{locationId}/update', [
    'as' => 'update_location',
    'uses' => 'LocationController@update'
]);

/*
 * Delete Routes
 */
Route::get( '/notebook/{notebookId}/location/{locationId}/trash', [
    'as' => 'trash_location',
    'uses' => 'LocationController@trash'
]);
Route::get( '/notebook/{notebookId}/location/{locationId}/restore', [
    'as' => 'restore_location',
    'uses' => 'LocationController@restore'
]);
Route::get( '/notebook/{notebookId}/location/{locationId}/destroy', [
    'as' => 'destroy_location',
    'uses' => 'LocationController@destroy'
]);