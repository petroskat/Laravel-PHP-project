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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::resource('advs','AdvsController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

/*Search routes , the get one is for keyword search, the post one is for form-searching..*/
Route::get('search/{s?}', 'SearchesController@getIndex')->where('s', '[\w\d]+');
Route::post('/search','SearchesController@search');
