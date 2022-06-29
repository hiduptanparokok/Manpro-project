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

Route::get('/', 'MenuController@index')->name('index');
Route::get('/about', 'MenuController@about')->name('about');
Route::get('/portofolio', 'MenuController@portofolio')->name('portofolio');
Route::get('/event', 'MenuController@event')->name('event');
Route::get('/schedule', 'MenuController@schedule')->name('schedule');
Route::get('/contact', 'MenuController@contact')->name('contact');