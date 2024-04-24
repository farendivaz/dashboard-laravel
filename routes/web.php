<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/InfoPage/InformasiSparepart', function () {
    return view('InfoPage/InformasiSparepart');
});
