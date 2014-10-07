<?php

/*
 * View Routes
 */
Route::get( '/notebook/{notebookId}/characters', [
    'as' => 'view_characters',
    'uses' => 'CharacterController@index'
]);
Route::get( '/notebook/{notebookId}/character/create', [
    'as' => 'create_character',
    'uses' => 'CharacterController@create'
]);
Route::get( '/notebook/{notebookId}/character/{characterId}/edit', [
    'as' => 'edit_character',
    'uses' => 'CharacterController@edit'
]);

/*
 * Action Routes
 */
Route::post( '/notebook/{notebookId}/character/store', [
    'as' => 'store_character',
    'uses' => 'CharacterController@store'
]);
Route::put( '/notebook/{notebookId}/character/{characterId}/update', [
    'as' => 'update_character',
    'uses' => 'CharacterController@update'
]);

/*
 * Delete Routes
 */
Route::get( '/notebook/{notebookId}/character/{characterId}/trash', [
    'as' => 'trash_character',
    'uses' => 'CharacterController@trash'
]);
Route::get( '/notebook/{notebookId}/character/{characterId}/restore', [
    'as' => 'restore_character',
    'uses' => 'CharacterController@restore'
]);
Route::get( '/notebook/{notebookId}/character/{characterId}/destroy', [
    'as' => 'destroy_character',
    'uses' => 'CharacterController@destroy'
]);