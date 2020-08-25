<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('items', 'ItemsController@index')->name('items');
Route::post('/items/search', 'ItemsController@search')->name('items.search');

Route::get('cart', 'CartController@index')->name('cart');
Route::get('empty-cart', 'CartController@empty_cart')->name('empty-cart');
Route::get('add-to-cart/{id}', 'CartController@addToCart')->name('add-to-cart');
Route::patch('update-cart', 'CartController@update')->name('update-cart');
Route::delete('remove-from-cart', 'CartController@remove')->name('remove-from-cart');

Route::resource('order','OrdersController')->only(['index','store']);

Route::get('checkout/success', 'CheckOutController@success')->name('checkout.success');
Route::get('checkout/fail', 'CheckOutController@fail')->name('checkout.fail');
