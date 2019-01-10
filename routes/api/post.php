<?php
Route::put('/post', 'PostController@create');
Route::group(['middleware' => ['auth:api', 'web']], function () {
    Route::get('/posts', 'PostController@index');
});