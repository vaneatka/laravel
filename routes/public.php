<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', 'ProductController@index');

Route::get('/test/run', 'TestController@run');

Route::get('/currencies/import', 'CurrencyController@import');

Route::get('/subscribe', 'ClientController@subscribeForm')->name('client.subscribe');
Route::post('/subscribe', 'ClientController@subscribe');

Route::resource('categories', 'CategoryController');



