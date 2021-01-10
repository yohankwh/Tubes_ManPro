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

Route::post('/admin/berita', 'AdminController@postBerita')->name("berita.post");
Route::get('/admin/berita/create','AdminController@createBerita')->name('berita.create');
Route::get('/admin/berita/{slug}','AdminController@viewBerita')->name('berita.view');
Route::post('/admin/berita/{slug}','AdminController@updateBerita')->name('berita.update');
Route::post('/admin/berita/{slug}/delete','AdminController@deleteBerita')->name('berita.delete');
Route::get('/admin/berita/{slug}/edit','AdminController@editBerita')->name('berita.edit');
Route::put('/admin/berita/{slug}','AdminController@updateBerita')->name('berita.update');

Route::get('admin/kasus','AdminController@kasus')->name('admin.kasus');
Route::post('admin/kasus/create-ku','AdminController@inputKasusUmum')->name('kasus.createKU');
Route::post('admin/kasus/create-kd','AdminController@inputKasusDaerah')->name('kasus.createKD');
Route::post('admin/kasus/create-demo','AdminController@inputDemografi')->name('kasus.createDemo');
Route::get('admin/importBulkKU','AdminController@bulkImportCSVKU');
Route::get('admin/importBulkKD','AdminController@bulkImportCSVKD');
Route::get('admin/importBulkDemo','AdminController@bulkImportCSVDemo');
// Route::get('admin/kasus/create','AdminController@createKasus')->name('kasus.create');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
