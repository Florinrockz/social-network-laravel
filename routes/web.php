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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post','PostController@index');

Route::post('/post','PostController@store')->middleware('auth');

Route::get('/post/{id}/edit','PostController@edit')->name('post.edit')->middleware('auth');

Route::post('/post/{id}/edit','PostController@update')->name('post.update')->middleware('auth');

Route::get('/post{id}/delete','PostController@destroy')->name('post.delete')->middleware('auth');

Route::get('/category','CategoryController@index');

Route::post('/category','CategoryController@store');

Route::post('/like','LikeController@index')->name('like')->middleware('auth');