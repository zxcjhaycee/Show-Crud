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
/* 
Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/', 'HomeController@index')->name('home');
// show
Route::resource('/shows', 'ShowController');
Route::put('/shows/{show}', 'ShowController@soft_delete')->name('shows.soft');

// audience
Route::get('/audiences', 'AudienceController@index')->name('audiences.index');
Route::get('/audiences/create', 'AudienceController@create')->name('audiences.create');
Route::post('/audiences/store', 'AudienceController@store')->name('audiences.store');
Route::get('/audiences/edit/{id}', 'AudienceController@edit')->name('audiences.edit');
Route::put('/audiences/update/{id}', 'AudienceController@update')->name('audiences.update');
Route::delete('/audiences/destroy/{id}', 'AudienceController@destroy')->name('audiences.destroy');

// audiences_show
Route::get('/audiences_show/view/{id}', 'ShowAudienceController@index')->name('audiences_show.index');
Route::get('audiences_show/watch/{show}', 'ShowAudienceController@watch')->name('audiences_show.watch');
Route::post('audiences_show/watch/submit/{show}', 'ShowAudienceController@watch_submit')->name('audiences_show.watch.submit');

Route::get('/home', 'HomeController@index')->name('home');
