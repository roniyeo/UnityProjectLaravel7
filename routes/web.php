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

// Admin
Route::get('/admin/login', 'Admin\LoginController@index');
Route::post('/admin/proseslogin', 'Admin\LoginController@login')->name('login');
Route::get('/admin/dashboard', 'Admin\AdminController@index')->name('dashboard');
Route::get('/admin/logout', 'Admin\LoginController@logout')->name('logout');
// Admin - Aminities
Route::get('/admin/aminities', 'Admin\AdminController@aminities')->name('aminities');
Route::get('/admin/aminities/create', 'Admin\AdminController@createAminities')->name('aminities.create');
Route::post('/admin/aminities/store', 'Admin\AdminController@storeAminities')->name('aminities.store');
Route::get('/admin/aminities/edit/{id}', 'Admin\AdminController@editAminities')->name('aminities.edit');
Route::post('/admin/aminities/update', 'Admin\AdminController@updateAminities')->name('aminities.update');
Route::get('/admin/aminities/delete/{id}', 'Admin\AdminController@deleteAminities')->name('aminities.delete');
// Admin - Agent
Route::get('/admin/agent', 'Admin\AdminController@agent')->name('agent');
Route::get('/admin/agent/create', 'Admin\AdminController@createAgent')->name('agent.create');
Route::post('/admin/agent/store', 'Admin\AdminController@storeAgent')->name('agent.store');
Route::get('/admin/agent/edit/{kode_agent}', 'Admin\AdminController@editAgent')->name('agent.edit');
Route::post('/admin/agent/update', 'Admin\AdminController@updateAgent')->name('agent.update');
Route::get('agentChangeStatus', 'Admin\AdminController@changeStatusAgent');
Route::get('/admin/aminities/delete/{kode_agent}', 'Admin\AdminController@deleteAgent')->name('agent.delete');
// Admin - Tipe Price
Route::get('/admin/tipeprice', 'Admin\AdminController@tipePrice')->name('tipeprice');
Route::get('/admin/tipeprice/create', 'Admin\AdminController@createTipePrice')->name('tipeprice.create');
Route::post('/admin/tipeprice/store', 'Admin\AdminController@storeTipePrice')->name('tipeprice.store');
Route::get('/admin/tipeprice/edit/{id}', 'Admin\AdminController@editTipePrice')->name('tipeprice.edit');
Route::post('/admin/tipeprice/update', 'Admin\AdminController@updateTipePrice')->name('tipeprice.update');
Route::get('/admin/tipeprice/delete/{id}', 'Admin\AdminController@deleteTipePrice')->name('tipeprice.delete');
// Admin - Property
Route::get('/admin/property', 'Admin\PropertyController@index')->name('property');
Route::get('/admin/property/show', 'Admin\PropertyController@show')->name('property.show');
Route::get('/admin/property/create', 'Admin\PropertyController@create')->name('property.create');
Route::post('/admin/property/store', 'Admin\PropertyController@store')->name('property.store');
Route::get('/admin/property/edit/{kode}', 'Admin\PropertyController@edit')->name('property.edit');
Route::get('/getKota', 'Admin\PropertyController@getKota');
Route::get('/getDaerah', 'Admin\PropertyController@getDaerah');
Route::post('/property/gallery/delete','Admin\PropertyController@galleryImageDelete')->name('property.gallery-delete');
