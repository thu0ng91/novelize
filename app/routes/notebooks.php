<?php

/*
 * View Routes
 */
Route::get( '/notebooks', [
    'as' => 'view_notebooks',
    'uses' => 'NotebookController@index'
]);
Route::get( '/notebook/create', [
    'as' => 'create_notebook',
    'uses' => 'NotebookController@create'
]);
Route::get( '/notebook/{notebookId}/new_notebook', [
    'as' => 'new_notebook',
    'uses' => 'NotebookController@new_notebook'
]);
Route::get( '/notebook/{notebookId}/edit', [
    'as' => 'edit_notebook',
    'uses' => 'NotebookController@edit'
]);
Route::get( '/notebook/{notebookId}/show', [
    'as' => 'show_notebook',
    'uses' => 'NotebookController@show'
]);

/*
 * Action Routes
 */
Route::post( '/notebook/store', [
    'as' => 'store_notebook',
    'uses' => 'NotebookController@store'
]);
Route::put( '/notebook/{notebookId}/update', [
    'as' => 'update_notebook',
    'uses' => 'NotebookController@update'
]);

/*
 * Delete Routes
 */
Route::get( '/notebook/{notebookId}/trash', [
    'as' => 'trash_notebook',
    'uses' => 'NotebookController@trash'
]);
Route::get( '/notebook/{notebookId}/restore', [
    'as' => 'restore_notebook',
    'uses' => 'NotebookController@restore'
]);
Route::get( '/notebook/{notebookId}/destroy', [
    'as' => 'destroy_notebook',
    'uses' => 'NotebookController@destroy'
]);