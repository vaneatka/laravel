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
     return view('public.home');})->name('home');

Route::get('/products', 'ProductController@index');

Route::get('/catalog/price/{sort}', 'ProductController@indexPriceSort');
Route::get('/catalog/date/{sort}', 'ProductController@indexDateSort');
Route::get('/catalog', 'CatalogController@index');


Route::get('/cart/add/{product_id}', 'CartController@add');
Route::get('/cart/view', 'CartController@view');
Route::delete('/cart/remove/{cart_item_id}', 'CartController@remove');

Route::get('/cart/checkout', 'CartController@checkout');
Route::get('/cart/payment', 'CartController@payment');
Route::post('/cart/charge', 'CartController@charge');


Route::get('/test/run', 'TestController@run');

Route::get('/currencies/import', 'CurrencyController@import');

Route::get('/subscribe', 'ClientController@subscribeForm')->name('client.subscribe');
Route::post('/subscribe', 'ClientController@subscribe');

Route::resource('categories', 'CategoryController');

////////////////////////
Route::get('/client/profile', 'ClientController@profile')->middleware('auth')->name('client.profile');

// Route::post('/client/create', '\App\Http\Controllers\Auth\RegisterController@create');
Auth::routes();
