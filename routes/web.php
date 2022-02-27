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
    Route::get('/drivers/getDriver/{id}', 'DriverController@getDriver')->name('driver.json');
    Route::get('/drivers/import', 'DriverController@import')->name('drivers.import');
    Route::post('/drivers/store_import', 'DriverController@storeImport')->name('drivers.store_import');
    Route::resource('/drivers', 'DriverController');
    // Route::get('/drivers', 'DriverController@index')->name('driver.index');
    // Route::get('/drivers/create', 'DriverController@create')->name('driver.create');
    // Route::post('/drivers/store', 'DriverController@store')->name('driver.store');
    // Route::get('/drivers/store', 'DriverController@store')->name('driver.edit');
    // Route::get('/drivers/store', 'DriverController@store')->name('driver.destroy');
    Route::resource('/vehicle_types', 'VehicleTypeController');
    Route::resource('/service_provider_types', 'ServiceProviderTypeController');
    Route::resource('/service_providers', 'ServiceProviderController');
    Route::resource('/collection_points', 'CollectionPointController');
    Route::resource('/areas', 'AreaController');
    Route::get('/weigh_in_logs/create_new', 'WeighInLogController@create_new')->name('weigh_in_logs.create_new');
    Route::post('/weigh_in_logs/store_new', 'WeighInLogController@store_new')->name('weigh_in_logs.store_new');
    Route::get('/weigh_in_logs/{weigh_in_log}/edit_new', 'WeighInLogController@edit_new')->name('weigh_in_logs.edit_new');
    Route::put('/weigh_in_logs/{weigh_in_log}/update_new', 'WeighInLogController@update_new')->name('weigh_in_logs.update_new');
    Route::resource('/weigh_in_logs', 'WeighInLogController');
    Route::get('/vehicles/getVehicle/{id}', 'VehicleController@getVehicle')->name('vehicle.json');
    Route::resource('/vehicles', 'VehicleController');
    Route::get('/tipping_fees/delete/{id}', 'DriverController@delete')->name('tipping_fees.delete');
    Route::resource('/tipping_fees', 'TippingFeeController');
    Route::get('/payments/generate/{id}', 'PaymentController@generate')->name('payments.generate');
    Route::resource('/payments', 'PaymentController');
});

Route::group(['prefix' => 'products', 'middleware' => 'auth'], function () {
    Route::get('/', 'ProductController@index')->name('products');
});
