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

//GRAPHSTAT ROUTES

//INFO ROUTES

//ADMIN ROUTES
Route::get('/admin', 'AdminController@index')->name("admin.index");
Route::get('/admin/berita', 'AdminController@berita')->name("admin.berita");
Route::get('/admin/berita/create', 'AdminController@createBerita')->name('berita.create');
Route::get('/admin/berita/{slug}', 'AdminController@viewBerita')->name('berita.viewBerita');
Route::post('/admin/berita/{slug}', 'AdminController@updateBerita')->name('berita.update');
Route::get('/admin/berita/{slug}/edit', 'AdminController@editBerita')->name('berita.edit');
Route::post('/admin/berita/{slug}', 'AdminController@updateBerita')->name('berita.update');
