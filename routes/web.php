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


Auth::routes();
Route::get('', 'AllWishesController@index')->name('welcome');
Route::get('home', 'HomeController@index')->name('home');
Route::get('wishes/view', 'AllWishesController@search')->name('viewWish');
Route::get('wishes/search', 'AllWishesController@search')->name('searchWish');
Route::post('/wishes', 'WishController@addWish')->name('addWish');
Route::put('/wishes/{id}', 'WishController@updateWish')->name('updateWish');
Route::delete('/wishes/delete/{id}', 'WishController@deleteWish')->name('deleteWish');
