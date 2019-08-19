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

Route::get('/subscribers', "AdminController@subscribers")->name('admin.subscribers');
Route::get('/subscribeMany', 'AdminController@subscribeManyForm')->name('admin.subscribemanyform');
Route::post('/subscribeMany', 'AdminController@subscribeMany');

// gestionarea categorielor
Route::resource('/categories', 'CategoryController');


