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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/dashboard', 'DashboardController@index');

Route::resource('posts', 'PostsController'); //TODO: Delete this when the implementation reference is no longer needed
Route::resource('/movies', 'MoviesController');
Route::put('/rate', 'MoviesController@rate');



