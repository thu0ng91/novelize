<?php

/*
 * Action Routes
 */
Route::get( 'novel/{novelId}/section/{sectionOrder}/add', [
    'as' => 'add_section',
    'uses' => 'NovelSectionController@store'
]);
Route::put( 'novel/{sectionId}/update', [
    'as' => 'update_novel',
    'uses' => 'NovelSectionController@update'
]);

/*
 * Delete Routes
 */
Route::get( 'novel/{sectionId}/trash', [
    'as' => 'trash_novel',
    'uses' => 'NovelSectionController@trash'
]);
Route::get( 'novel/{sectionId}/restore', [
    'as' => 'restore_novel',
    'uses' => 'NovelSectionController@restore'
]);
Route::get( 'novel/{sectionId}/destroy', [
    'as' => 'destroy_novel',
    'uses' => 'NovelSectionController@destroy'
]);