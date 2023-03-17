<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Define the admin dashboard route
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    });
    //Route::resource('admin/company', 'CompanyController');
    Route::get('admin/company/index', [CompanyController::class, 'index'])->name('company.index');
    Route::get('admin/company/create', [CompanyController::class, 'create'])->name('company.create');
    Route::post('admin/company/store', [CompanyController::class, 'store'])->name('company.store');
    Route::get('admin/company/{id}/edit', [CompanyController::class, 'edit'])->name('company.edit');
    Route::put('admin/company/{id}', [CompanyController::class, 'update'])->name('company.update');
    Route::get('admin/company/{id}',[CompanyController::class,'destroy'])->name('company.destroy');
    //Define the companies and employees resource routes
    //Route::resource('admin/employee', 'EmployeeController');
    Route::get('admin/employee/index', [EmployeeController::class, 'index'])->name('employee.index');
    Route::get('admin/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('admin/employee/store', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('admin/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::put('admin/employee/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::get('admin/employee/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
});





