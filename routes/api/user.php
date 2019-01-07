<?php
Route::put('/user', 'UserController@create');
Route::get('/users', 'UserController@index');

Route::group(['middleware' => ['auth:api', 'web']], function () {
    Route::get('/user', 'UserController@getUserFromAccessToken');
    Route:: get('/logout', 'UserController@logout');
});