<?php

/*
 * View Routes
 */
Route::get( '/journal', [
    'as' => 'view_journal',
    'uses' => 'EntryController@index'
]);
Route::get( '/journal/entry/create', [
    'as' => 'create_entry',
    'uses' => 'EntryController@create'
]);
Route::get( '/journal/entry/{entryId}/edit', [
    'as' => 'edit_entry',
    'uses' => 'EntryController@edit'
]);

/*
 * Action Routes
 */
Route::post( 'entry/store', [
    'as' => 'store_entry',
    'uses' => 'EntryController@store'
]);
Route::put( 'entry/{entryId}/update', [
    'as' => 'update_entry',
    'uses' => 'EntryController@update'
]);

/*
 * Delete Routes
 */
Route::get( 'entry/{entryId}/trash', [
    'as' => 'trash_entry',
    'uses' => 'EntryController@trash'
]);
Route::get( 'entry/{entryId}/restore', [
    'as' => 'restore_entry',
    'uses' => 'EntryController@restore'
]);
Route::get( 'entry/{entryId}/destroy', [
    'as' => 'destroy_entry',
    'uses' => 'EntryController@destroy'
]);