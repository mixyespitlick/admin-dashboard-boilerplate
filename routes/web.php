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

use App\Http\Controllers\DriverController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', 'DashboarController@index')->name('dashboard');
    Route::resource('/drivers', 'DriverController');
    // Route::get('/drivers', 'DriverController@index')->name('driver.index');
    // Route::get('/drivers/create', 'DriverController@create')->name('driver.create');
    // Route::post('/drivers/store', 'DriverController@store')->name('driver.store');
    // Route::get('/drivers/store', 'DriverController@store')->name('driver.edit');
    // Route::get('/drivers/store', 'DriverController@store')->name('driver.destroy');
    Route::resource('/vehicle_types', 'VehicleTypeController');
});

Route::group(['prefix' => 'products', 'middleware' => 'auth'], function () {
    Route::get('/', 'ProductController@index')->name('products');
});
