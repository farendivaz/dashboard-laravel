<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\StatusController;

Route::get('/', function () {
    return view('HalamanDepan/home');
});

Route::get('/home', function () {
    return view('HalamanDepan/home');
});

Route::get('/InfoPage/DataCell', function () {
    return view('InfoPage/DataCell');
});

Route::get('/InfoPage/InformasiService', function () {
    return view('InfoPage/InformasiService');
});

Route::get('/InfoPage/StatusService', function () {
    return view('InfoPage/StatusService');
});

Route::get('/StatusService', function () {
    return view('Tabel/StatusService');
});

Route::get('/InfoPage/DataKaryawan', function () {
    return view('InfoPage/DataKaryawan');
});

// Route Customer
Route::prefix('customers')
->controller(CustomerController::class)
->name('customer.')
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/search', 'search')->name('search');
    Route::post('/create', 'store')->name('store');
    Route::get('/edit/{customer}', 'edit')->name('edit');
    Route::patch('/update/{customer}', 'update')->name('update');
    Route::delete('/delete/{customer}', 'destroy')->name('destroy');
});

// Route Employees
Route::prefix('employees')
->controller(EmployeeController::class)
->name('employee.')
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/search', 'search')->name('search');
    Route::post('/create', 'store')->name('store');
    Route::get('/edit/{employee}', 'edit')->name('edit');
    Route::patch('/update/{employee}', 'update')->name('update');
    Route::delete('/delete/{employee}', 'destroy')->name('destroy');
});

// Route Sparepart
Route::prefix('spareparts')
->controller(SparepartController::class)
->name('sparepart.')
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/search', 'search')->name('search');
    Route::post('/create', 'store')->name('store');
    Route::get('/edit/{sparepart}', 'edit')->name('edit');
    Route::patch('/update/{sparepart}', 'update')->name('update');
    Route::delete('/delete/{sparepart}', 'destroy')->name('destroy');
});

// Route Admin
Route::prefix('admin')
->controller(AdminController::class)
->name('admin.')
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/search', 'search')->name('search');
    Route::post('/create', 'store')->name('store');
    Route::get('/edit/{admin}', 'edit')->name('edit');
    Route::patch('/update/{admin}', 'update')->name('update');
    Route::delete('/delete/{admin}', 'destroy')->name('destroy');
});

// Route Status
Route::prefix('status')
->controller(StatusController::class)
->name('status.')
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/search', 'search')->name('search');
    Route::post('/create', 'store')->name('store');
    Route::get('/edit/{status}', 'edit')->name('edit');
    Route::patch('/update/{status}', 'update')->name('update');
    Route::delete('/delete/{status}', 'destroy')->name('destroy');
});

// Route Service
Route::prefix('services')
->controller(ServiceController::class)
->name('service.')
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/search', 'search')->name('search');
    Route::post('/create', 'store')->name('store');
    Route::get('/edit/{service}', 'edit')->name('edit');
    Route::patch('/update/{service}', 'update')->name('update');
    Route::delete('/delete/{service}', 'destroy')->name('destroy');
    Route::get('/customer/{id}', 'getCustomerData')->name('getCustomerData');
    Route::get('/employee/{id}', 'getEmployeeData')->name('getEmployeeData');

});
