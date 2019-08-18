<?php

/*
Rutele administrative
*/

Route::get('/', function () {
    return view('admin.dashboard');
});

Route::get('/test', function () {
    return 'Test normal';
});

Route::get('/subscribers', "AdminController@subscribers");
Route::get('/subscribeMany', 'AdminController@subscribeManyForm')->name('admin.subscribeMany');
Route::post('/subscribeMany', 'AdminController@subscribeMany');


