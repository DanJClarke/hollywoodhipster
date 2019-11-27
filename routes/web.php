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

Route::get('/', 'PagesController@home');

Route::get('/foundation-test', 'PagesController@foundation');

Route::get('/films', 'FilmsController@index');
Route::post('/films', 'FilmsController@store');
Route::get('/films/create', 'FilmsController@create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
