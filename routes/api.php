<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\EmployeeResource;
use App\Models\Company;
use App\Models\Employee;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/companies', function () {
    return CompanyResource::collection(Company::all());
});

Route::get('/companies/{id}', function ($id) {
    return new CompanyResource(Company::findOrFail($id));
});

Route::get('/employees', function () {
    return EmployeeResource::collection(Employee::all());
});

Route::get('/employees/{id}', function ($id) {
    return new EmployeeResource(Employee::findOrFail($id));
});


