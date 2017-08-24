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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/login', 'UsersController@login')->name('login');
Route::post('/login','UsersController@store')->name('login');
Route::get('/admin', 'UsersController@admin')->name('admin');
Route::get('/logout', 'UsersController@destroy')->name('logout');

Route::get('/', 'NewsController@home')->name('home');
Route::get('/news', 'NewsController@index')->name('news');
Route::get('/news_create', 'NewsController@create')->name('news_create');
Route::get('/news/{news}', 'NewsController@show')->name('news_show');
Route::post('/news/{news}', 'NewsController@edit')->name('news_edit');
Route::patch('/news/{news}', 'NewsController@update')->name('news_update');
Route::post('/news_create', 'NewsController@store')->name('news_store');
Route::delete('/news/{news}', 'NewsController@destroy')->name('news_delete');

Route::get('/product', 'ProductController@index')->name('product');
Route::get('/product_create', 'ProductController@create')->name('product_create');
Route::post('/product_create', 'ProductController@store')->name('product_store');
Route::post('/product/{product}', "ProductController@edit")->name('product_edit');
Route::patch('/product/{product}', 'ProductController@update')->name('product_update');
Route::delete('/product/{product}', 'ProductController@destroy')->name('product_delete');

Route::get('/upload', 'UploadController@index')->name('picture');
Route::post('/upload/file', 'UploadController@uploadFile')->name('upload');
Route::delete('/upload/file', 'UploadController@deleteFile');