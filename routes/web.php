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

Route::delete('/manage-reviews/{review}', 'FilmReviewsController@destroy')->middleware('can:manage-all');
Route::get('/manage-reviews/{review}/edit', 'FilmReviewsController@edit')->middleware('can:add-reviews');
Route::patch('/manage-reviews/{review}', 'FilmReviewsController@update')->middleware('can:add-reviews');
Route::patch('/manage-reviews/{review}', 'FilmReviewsController@update')->middleware('can:add-reviews');

//======== Routes for Managing Reviews ============================

Route::get('/manage-reviews', 'FilmReviewsController@index')->name('reviews.manage')->middleware('can:manage-all');
Route::get('/manage-reviews/create', 'FilmReviewsController@create')->name('reviews.create')->middleware('can:add-reviews');
Route::get('/manage-reviews/{review}', 'FilmReviewsController@show')->name('reviews.show');
Route::get('/manage-my-reviews/{user}', 'FilmReviewsController@showMine')->name('reviews.mine');
Route::post('/manage-reviews', 'FilmReviewsController@store')->name('reviews.store')->middleware('can:add-reviews');
Route::get('/manage-my-reviews/{review}/edit', 'FilmReviewsController@edit')->name('reviews.edit')->middleware('can:add-reviews');
Route::patch('/manage-my-reviews/{review}', 'FilmReviewsController@update')->name('reviews.update')->middleware('can:add-reviews');
Route::delete('/manage-reviews/{review}', 'FilmReviewsController@destroy')->name('reviews.delete')->middleware('can:manage-users');


//======== Routes for Managing Films ============================

//Route::resource('/manage-films', 'ManageFilmsController');
Route::get('/manage-films', 'ManageFilmsController@index')->name('films.manage');
Route::get('/manage-films/create', 'ManageFilmsController@create')->name('films.create');
Route::get('/manage-films/{film}', 'ManageFilmsController@show')->name('films.show');
Route::post('/manage-films', 'ManageFilmsController@store')->name('films.store');
Route::get('/manage-films/{film}/edit', 'ManageFilmsController@edit')->name('films.edit');
Route::patch('/manage-films/{film}', 'ManageFilmsController@update')->name('films.update');
Route::delete('/manage-films/{film}', 'ManageFilmsController@destory')->name('films.delete');


//======== Routes for Managing Directors ============================

//Route::resource('/manage-directors', 'ManageDirectorsController')->middleware('can:manage-all');
Route::get('/manage-directors', 'ManageDirectorsController@index');
Route::get('/manage-directors/create', 'ManageDirectorsController@create');
Route::get('/manage-directors/{director}', 'ManageDirectorsController@show');
Route::post('/manage-directors', 'ManageDirectorsController@store');
Route::get('/manage-directors/{director}/edit', 'ManageDirectorsController@edit');
Route::patch('/manage-directors/{director}', 'ManageDirectorsController@update');
Route::delete('/manage-directors/{director}', 'ManageDirectorsController@destory');

//======== Routes for Authentication ============================

Auth::routes();

//======== Routes for Users and Admin ============================

Route::get('/home', 'HomeController@index')->name('home');

//======== Routes for Admin ============================

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});
