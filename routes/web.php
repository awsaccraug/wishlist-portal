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

use Illuminate\Support\Facades\Log;

Auth::routes();
// Route::get('/test', function () {
//     Log::info('testing logs');
//     return 'logged';
// });

// routes for wishers
Route::get('wisher_profile', 'WisherController@showProfile')->name('showWisherProfile');
Route::put('wisher_profile', 'WisherController@updateProfile')->name('updateWisherProfile');
Route::delete('profile_photo', 'WisherController@removeProfilePhoto')->name('removeProfilePhoto');
Route::get('home', 'WisherController@index')->name('home');

// routes for wishes
Route::get('', 'AllWishesController@index')->name('welcome');
Route::get('wishes/view', 'AllWishesController@search')->name('viewWish');
Route::get('wishes/search', 'AllWishesController@search')->name('searchWish');
Route::post('wishes', 'WishController@addWish')->name('addWish');
Route::put('wishes/{id}', 'WishController@updateWish')->name('updateWish');
Route::delete('wishes/delete/{id}', 'WishController@deleteWish')->name('deleteWish');
