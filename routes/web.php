<?php

use App\Http\Controllers\Admin\ApprovedController;
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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/property', 'HomeController@property')->name('properties');
Route::get('/property/{kode}', 'HomeController@showProperty')->name('properties.show');
Route::get('/agency', 'HomeController@agents')->name('agency');
Route::get('/agency/{kode}', 'HomeController@showAgents')->name('agency.show');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/blog', 'HomeController@blog')->name('blog');
Route::get('/search', 'HomeController@searchByFilterProperty')->name('search');

// Admin
Route::get('/admin/login', 'Admin\LoginController@index');
Route::post('/admin/login', 'Admin\LoginController@login')->name('login');
Route::group(['middleware' => 'auth'], function ()
{
    Route::get('/admin/dashboard', 'Admin\AdminController@index')->name('dashboard');
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
    Route::get('/admin/property/show/{kode}', 'Admin\PropertyController@show')->name('property.show');
    Route::get('/admin/property/create', 'Admin\PropertyController@create')->name('property.create');
    Route::post('/admin/property/store', 'Admin\PropertyController@store')->name('property.store');
    Route::get('/admin/property/edit/{kode}', 'Admin\PropertyController@edit')->name('property.edit');
    Route::post('/admin/property/update', 'Admin\PropertyController@update')->name('property.update');
    Route::post('/admin/property/destroy', 'Admin\PropertyController@destroy')->name('property.destroy');
    Route::get('/admin/property/approved', 'Admin\ApprovedController@index')->name('property.approved');
    Route::get('/admin/property/approved/update/{kode}', 'Admin\ApprovedController@update')->name('property.approved.update');
    Route::get('/getKota', 'Admin\PropertyController@getKota');
    Route::get('/getDaerah', 'Admin\PropertyController@getDaerah');
    Route::post('/property/gallery/delete','Admin\PropertyController@galleryImageDelete')->name('property.gallery-delete');

    // Admin - Front End - Slider
    Route::get('/admin/slider', 'Admin\SliderController@index')->name('slider');
    Route::get('/admin/slider/create', 'Admin\SliderController@create')->name('slider.create');
    Route::post('/admin/slider/store', 'Admin\SliderController@store')->name('slider.store');

    // Logout
    Route::get('/admin/logout', 'Admin\LoginController@logout')->name('logout');
});

Route::get('/agent/login', 'Agent\LoginController@index');
Route::post('/agent/login', 'Agent\LoginController@login')->name('agent.login');
Route::group(['middleware' => 'checkagent'], function ()
{
    Route::get('/agent/portal', 'Agent\AgentController@index')->name('portal');
    Route::get('/agent/logout', 'Agent\LoginController@logout')->name('agent.logout');

    // Agent - Create Property
    Route::get('/agent/property', 'Agent\PropertyController@index')->name('agent.property');
    Route::get('/agent/property/create', 'Agent\PropertyController@create')->name('agent.property.create');
    Route::post('/agent/property/store', 'Agent\PropertyController@store')->name('agent.property.store');
    Route::get('/agent/property/show/{kode}', 'Agent\PropertyController@show')->name('agent.property.show');
    Route::get('/agent/property/edit/{kode}', 'Agent\PropertyController@edit')->name('agent.property.edit');
    Route::post('/agent/property/update', 'Agent\PropertyController@update')->name('agent.property.update');
    Route::post('/agent/property/destroy', 'Agent\PropertyController@destroy')->name('agent.property.destroy');
    Route::get('/getKota', 'Agent\PropertyController@getKota');
    Route::get('/getDaerah', 'Agent\PropertyController@getDaerah');
    Route::post('/agent/property/gallery/delete','Agent\PropertyController@galleryImageDelete')->name('agent.property.gallery-delete');

    // Agent - Listing New
    Route::get('/agent/newproperty', 'Agent\AgentController@listNewProperty')->name('agent.newproperty');

    // Agent - Customer
    Route::get('/agent/customer', 'Agent\CustomerController@index')->name('agent.customer');

    // Agent - Profile
    Route::get('/agent/profile', 'Agent\AgentController@profile')->name('agent.profile');
    Route::get('/agent/profile/edit/{kode}', 'Agent\AgentController@editProfile')->name('agent.profile.edit');
    Route::post('/agent/profile/update', 'Agent\AgentController@updateProfile')->name('agent.profile.update');

    // Agent - Change Password
    Route::get('/agent/change-password', 'Agent\AgentController@changePassword')->name('agent.change-password');
    Route::post('/agent/change-password', 'Agent\AgentController@updatePassword')->name('agent.update-password');
});
