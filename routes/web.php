<?php

use Illuminate\Support\Facades\Auth;
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



Auth::routes();

// Article
Route::get('/', 'ArticleController@index')->name('article.index');
Route::get('/ads', 'ArticleController@ads')->name('article.ads');
Route::get('/articles/create', 'ArticleController@create')->name('article.create');
Route::post('articles', 'ArticleController@store');
Route::get('/articles/{article}', 'ArticleController@show')->name('article.show');
Route::get('/articles/{article}/edit', 'ArticleController@edit');
Route::put('/articles/{article}', 'ArticleController@update');
Route::get('/deleted/{article}', 'ArticleController@deleted');
Route::get('/trashed', 'ArticleController@trashed')->name('article.trashed');

// Rent
Route::get('/sent', 'RentController@sent')->name('sent');
Route::get('/incoming', 'RentController@incoming')->name('incoming');
Route::post('/request/{id}', 'RentController@request');
Route::post('/accepted', 'RentController@accepted');
Route::post('/rejected', 'RentController@rejected');
Route::get('/accept/{id}', 'RentController@accept')->name('accept');
Route::get('/reject/{id}', 'RentController@reject')->name('reject');
Route::get('/accepted', 'RentController@accepted')->name('accepted');
Route::get('/rejected', 'RentController@rejected')->name('rejected');

