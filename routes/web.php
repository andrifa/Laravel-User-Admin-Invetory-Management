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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function(){
    
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::delete('/{id}','AdminController@destroy')->name('admin.destroy');
    Route::put('/{id}','AdminController@update')->name('admin.update');

    Route::get('/inventory','AdminInventoryController@index')->name('admin.inventory');
    Route::put('/inventory/{id}','AdminInventoryController@update')->name('admin.inventory.update');
});

Route::get('/inventory/get_datatable','InventoryController@get_datatable');
route::resource('inventory','InventoryController');

