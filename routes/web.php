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

Route::delete('/reviews/{review}', 'FilmReviewsController@destroy')->middleware('can:manage-all');


//Route::resource('/manage-films', 'ManageFilmsController');

Route::get('/manage-films', 'ManageFilmsController@index');
Route::get('/manage-films/create', 'ManageFilmsController@create');
Route::get('/manage-films/{film}', 'ManageFilmsController@show');
Route::post('/manage-films', 'ManageFilmsController@store');
Route::get('/manage-films/{film}/edit', 'ManageFilmsController@edit');
Route::patch('/manage-films/{film}', 'ManageFilmsController@update');
Route::delete('/manage-films/{film}', 'ManageFilmsController@destory');



//Route::resource('/manage-directors', 'ManageDirectorsController')->middleware('can:manage-all');


Route::get('/manage-directors', 'ManageDirectorsController@index');
Route::get('/manage-directors/create', 'ManageDirectorsController@create');
Route::get('/manage-directors/{director}', 'ManageDirectorsController@show');
Route::post('/manage-directors', 'ManageDirectorsController@store');
Route::get('/manage-directors/{director}/edit', 'ManageDirectorsController@edit');
Route::patch('/manage-directors/{director}', 'ManageDirectorsController@update');
Route::delete('/manage-directors/{director}', 'ManageDirectorsController@destory');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});
