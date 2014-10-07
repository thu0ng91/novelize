<?php

/*
 * View Routes
 */
Route::get( '/notebook/{notebookId}/notes', [
    'as' => 'view_notes',
    'uses' => 'NoteController@index'
]);
Route::get( '/notebook/{notebookId}/note/create', [
    'as' => 'create_note',
    'uses' => 'NoteController@create'
]);
Route::get( '/notebook/{notebookId}/note/{noteId}/edit', [
    'as' => 'edit_note',
    'uses' => 'NoteController@edit'
]);

/*
 * Action Routes
 */
Route::post( '/notebook/{notebookId}/note/store', [
    'as' => 'store_note',
    'uses' => 'NoteController@store'
]);
Route::put( '/notebook/{notebookId}/note/{noteId}/update', [
    'as' => 'update_note',
    'uses' => 'NoteController@update'
]);

/*
 * Delete Routes
 */
Route::get( '/note/{noteId}/trash', [
    'as' => 'trash_note',
    'uses' => 'NoteController@trash'
]);
Route::get( '/note/{noteId}/restore', [
    'as' => 'restore_note',
    'uses' => 'NoteController@restore'
]);
Route::get( '/note/{noteId}/destroy', [
    'as' => 'destroy_note',
    'uses' => 'NoteController@destroy'
]);