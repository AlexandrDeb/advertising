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

Route::get('/', 'Auth\LoginUserController@index')->name('login');
Route::post('/post', 'Auth\LoginUserController@login')->name('login.post');
Route::post('/logout', 'Auth\LoginUserController@logout')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/edit', 'AdsController@edit')->name('edit');
    Route::post('/edit/store', 'AdsController@store')->name('edit.store');
    Route::delete('/delete/{id}', 'AdsController@delete')->name('delete');
    Route::get('/edit/{id}', 'AdsController@showUpdate')->name('show.update');
    Route::post('/edit/{id}/update', 'AdsController@update')->name('update');
});
Route::get('/{id}', 'AdsController@show')->name('show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
