<?php

/*
 * View Routes
 */
Route::get( '/novels', [
    'as' => 'view_novels',
    'uses' => 'NovelController@index'
]);
Route::get( '/novel/create', [
    'as' => 'create_novel',
    'uses' => 'NovelController@create'
]);
Route::get( '/novel/{novelId}/edit', [
    'as' => 'edit_novel',
    'uses' => 'NovelController@edit'
]);


Route::get( '/novel/{novelId}/plot/{sceneId}', [
    'as' => 'plot_novel',
    'uses' => 'NovelController@plot'
]);
Route::get( '/novel/{novelId}/write/{sceneId}', [
    'as' => 'write_novel',
    'uses' => 'NovelController@write'
]);
Route::get( '/novel/{novelId}/review/{sceneId}', [
    'as' => 'review_novel',
    'uses' => 'NovelController@review'
]);
Route::get( '/novel/{novelId}/publish/{sceneId}', [
    'as' => 'publish_novel',
    'uses' => 'NovelController@publish'
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