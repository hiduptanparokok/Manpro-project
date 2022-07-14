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
Route::get('/materi', 'MenuController@materi')->name('materi');
Route::get('/contact', 'MenuController@contact')->name('contact');

// Admin routes 

Route::get('/admin/login', 'AdminController@login')->name('login');
Route::post('/login/admin', 'AdminController@adminLogin')->name('admin.login');
Route::any('/logout', 'AdminController@logout')->name('admin.logout');

Route::group(["middleware" => [\App\Http\Middleware\LoginSession::class]], function () {
    Route::get('/admin/dashboard', 'AdminController@admin_dashboard')->name('admin.dashboard');

    // CRUD ABOUTNYA 
    Route::get('/admin/about', 'AboutController@index')->name('admin.about');
    Route::get('/admin/create-about', 'AboutController@create')->name('admin.about.create');
    Route::post('/admin/create-about', 'AboutController@store')->name('admin.about.store');
    Route::get('/admin/create-about-edit/{about:id}', 'AboutController@edit')->name('admin.about.edit');
    Route::post('/admin/create-about-edit/{about:id}', 'AboutController@update')->name('admin.about.update');
    Route::delete('/admin/create-about-delete/{id}', 'AboutController@delete')->name('admin.about.hapus');

    // CRUD PORTO 
    Route::get('/admin/porto', 'PortofoliosController@index')->name('admin.porto');
    Route::get('/admin/create-porto', 'PortofoliosController@create')->name('admin.porto.create');
    Route::post('/admin/create-porto', 'PortofoliosController@store')->name('admin.porto.store');
    Route::get('/admin/create-porto-edit/{about:id}', 'PortofoliosController@edit')->name('admin.porto.edit');
    Route::post('/admin/create-porto-edit/{about:id}', 'PortofoliosController@update')->name('admin.porto.update');
    Route::delete('/admin/create-porto-delete/{id}', 'PortofoliosController@delete')->name('admin.porto.hapus');

    // CRUD Skills 
    Route::get('/admin/skills', 'SkillsController@index')->name('admin.skills');
    Route::get('/admin/create-skills', 'SkillsController@create')->name('admin.skills.create');
    Route::post('/admin/create-skills', 'SkillsController@store')->name('admin.skills.store');
    Route::get('/admin/create-skills-edit/{skills:id}', 'SkillsController@edit')->name('admin.skills.edit');
    Route::post('/admin/create-skills-edit/{skills:id}', 'SkillsController@update')->name('admin.skills.update');
    Route::delete('/admin/create-skills-delete/{id}', 'SkillsController@delete')->name('admin.skills.hapus');

    // CRUD Events
    Route::get('/admin/events', 'EventsController@index')->name('admin.events');
    Route::get('/admin/create-events', 'EventsController@create')->name('admin.events.create');
    Route::post('/admin/create-events', 'EventsController@store')->name('admin.events.store');
    Route::get('/admin/create-events-edit/{events:id}', 'EventsController@edit')->name('admin.events.edit');
    Route::post('/admin/create-events-edit/{events:id}', 'EventsController@update')->name('admin.events.update');
    Route::delete('/admin/create-events-delete/{id}', 'EventsController@delete')->name('admin.events.hapus');

    // CRUD Materi Perkuliahan
    Route::get('/admin/materi', 'MateriController@index')->name('admin.materi');
    Route::get('/admin/create-materi', 'MateriController@create')->name('admin.materi.create');
    Route::post('/admin/create-materi', 'MateriController@store')->name('admin.materi.store');
    Route::get('/admin/create-materi-edit/{about:id}', 'MateriController@edit')->name('admin.materi.edit');
    Route::post('/admin/create-materi-edit/{about:id}', 'MateriController@update')->name('admin.materi.update');
    Route::delete('/admin/create-materi-delete/{id}', 'MateriController@delete')->name('admin.materi.hapus');
});
