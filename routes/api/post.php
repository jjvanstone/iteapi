<?php
Route::group(['middleware' => ['auth:api', 'web']], function () {
    Route::put('/post', 'PostController@create');
    Route::get('/posts', 'PostController@index');
});