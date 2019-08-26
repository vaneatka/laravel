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
Route::get('/subscribeMany', 'AdminController@subscribeMany')->name('admin.subscribeMany');
Route::post('/subscribeMany', 'AdminController@subscribeMany');

Route::get('delete/subscribers', 'AdminController@delete_table');

// gestionarea categorielor
Route::resource('categories','CategoryController');

Route::get('/products','ImportController@add');



