<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'section', 'middleware' => 'admin'], function () {
    Route::get('/', 'SectionController@index')->name('section.index');
    Route::get('/create', 'SectionController@create')->name('section.create');
    Route::post('/store', 'SectionController@store')->name('section.store');
    Route::get('/edit/{section}', 'SectionController@edit')->name('section.edit');
    Route::post('/update/{section}', 'SectionController@update')->name('section.update');
    Route::post('/destroy/{section}', 'SectionController@destroy')->name('section.destroy');
});

Route::group(['prefix' => 'user', 'middleware' => 'admin'], function () {
    Route::get('/', 'UserController@index')->name('user.index');
    Route::get('/create', 'UserController@create')->name('user.create');
    Route::post('/store', 'UserController@store')->name('user.store');
    Route::get('/edit/{user}', 'UserController@edit')->name('user.edit');
    Route::post('/update/{user}', 'UserController@update')->name('user.update');
    Route::post('/destroy/{user}', 'UserController@destroy')->name('user.destroy');
});
