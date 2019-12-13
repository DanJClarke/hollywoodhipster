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

//======== Routes for Managing Reviews ============================
Route::resource('/manage-reviews', 'FilmReviewsController');

//======== Routes for Users to manage their Reviews ============================

Route::get('/manage-my-reviews/{user}', 'MyReviewsController@show')->name('reviews.mine');
Route::get('/manage-my-reviews/{review}/edit', 'MyReviewsController@edit')->name('reviews.edit')->middleware('can:add-reviews');
Route::patch('/manage-my-reviews/{review}', 'MyReviewsController@update')->name('reviews.update')->middleware('can:add-reviews');

//======== Routes for Users to manage their Ratings ============================

Route::post('/manage-rating', 'RatingController@store');


//======== Routes for Managing Films ============================

Route::resource('/manage-films', 'ManageFilmsController');

//======== Routes Films ============================

Route::get('/film-data', 'FilmController@index')->name('films.data');

//======== Routes for Managing Directors ============================

Route::resource('manage-directors', 'DirectorController');

//======== Routes for Authentication ============================

Auth::routes();

//======== Routes for Users and Admin ============================
Route::get('/home', 'HomeController@index')->name('home');

//======== Routes for Admin ============================

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){

    Route::resource('/users', 'UsersController', ['except' => [ 'create', 'store']]);

});
