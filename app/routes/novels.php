<?php

/*
 * View Routes
 */
Route::get( 'app/novels', [
    'as' => 'view_novels',
    'uses' => 'NovelController@index'
]);
Route::get( 'app/novel/create', [
    'as' => 'create_novel',
    'uses' => 'NovelController@create'
]);
Route::get( 'app/novel/{novelId}/edit', [
    'as' => 'edit_novel',
    'uses' => 'NovelController@edit'
]);
Route::get( 'app/novel/{novelId}/show', [
    'as' => 'show_novel',
    'uses' => 'NovelController@show'
]);
Route::get( 'app/novel/{novelId}/write', [
    'as' => 'write_novel',
    'uses' => 'NovelController@write'
]);

/*
 * Action Routes
 */
Route::post( 'novel/store', [
    'as' => 'store_novel',
    'uses' => 'NovelController@store'
]);
Route::put( 'novel/{novelId}/update', [
    'as' => 'update_novel',
    'uses' => 'NovelController@update'
]);

/*
 * Delete Routes
 */
Route::get( 'novel/{novelId}/trash', [
    'as' => 'trash_novel',
    'uses' => 'NovelController@trash'
]);
Route::get( 'novel/{novelId}/restore', [
    'as' => 'restore_novel',
    'uses' => 'NovelController@restore'
]);
Route::get( 'novel/{novelId}/destroy', [
    'as' => 'destroy_novel',
    'uses' => 'NovelController@destroy'
]);