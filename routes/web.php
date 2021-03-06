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

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('genders', 'GenderController')->middleware('auth');

Route::resource('movies', 'MovieController')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/like/{movie}', 'HomeController@like')->name('like');

Route::get('/home/dont-like/{movie}', 'HomeController@dontLike')->name('dont-like');