<?php

/*
 * View Routes
 */
Route::get( '/novel/{novelId}/chapter/{chapterId}/scene/create', [
    'as' => 'create_scene',
    'uses' => 'SceneController@create'
]);



/*
 * Action Routes
 */
Route::get( 'novel/{novelId}/chapter/{chapterId}/scene/store', [
    'as' => 'store_scene',
    'uses' => 'SceneController@store'
]);
Route::put( 'novel/{novelId}/scene/{sceneId}/update', [
    'as' => 'update_scene',
    'uses' => 'SceneController@update'
]);

/*
 * Delete Routes
 */
Route::get( 'novel/{novelId}/scene/{sceneId}/trash', [
    'as' => 'trash_scene',
    'uses' => 'SceneController@trash'
]);
Route::get( 'novel/{novelId}/scene/{sceneId}/restore', [
    'as' => 'restore_scene',
    'uses' => 'SceneController@restore'
]);
Route::get( 'novel/{novelId}/scene/{sceneId}/destroy', [
    'as' => 'destroy_scene',
    'uses' => 'SceneController@destroy'
]);