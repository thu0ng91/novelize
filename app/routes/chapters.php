<?php

/*
 * View Routes
 */
Route::get( '/novel/{novelId}/chapter/create', [
    'as' => 'create_chapter',
    'uses' => 'ChapterController@create'
]);



/*
 * Action Routes
 */
Route::get( 'novel/{novelId}/chapter/store', [
    'as' => 'store_chapter',
    'uses' => 'ChapterController@store'
]);
Route::put( 'novel/{novelId}/chapter/{chapterId}/update', [
    'as' => 'update_chapter',
    'uses' => 'ChapterController@update'
]);

/*
 * Delete Routes
 */
Route::get( 'novel/{novelId}/chapter/{chapterId}/trash', [
    'as' => 'trash_chapter',
    'uses' => 'ChapterController@trash'
]);
Route::get( 'novel/{novelId}/chapter/{chapterId}/restore', [
    'as' => 'restore_chapter',
    'uses' => 'ChapterController@restore'
]);
Route::get( 'novel/{novelId}/chapter/{chapterId}/destroy', [
    'as' => 'destroy_chapter',
    'uses' => 'ChapterController@destroy'
]);