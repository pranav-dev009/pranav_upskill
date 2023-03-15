<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ItemsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('items/create/', [ItemsController::class, 'createAPI'])->name('items.create');
Route::post('items/read/', [ItemsController::class, 'readAPI'])->name('items.read');
Route::post('items/update/', [ItemsController::class, 'updateAPI'])->name('items.update');
Route::post('items/delete/', [ItemsController::class, 'deleteAPI'])->name('items.delete');

Route::post('company/create/', [CompanyController::class, 'createAPI'])->name('company.create');
Route::post('company/read/', [CompanyController::class, 'readAPI'])->name('company.read');
Route::post('company/update/', [CompanyController::class, 'updateAPI'])->name('company.update');
Route::post('company/delete/', [CompanyController::class, 'deleteAPI'])->name('company.delete');

Route::post('employee/create/', [EmployeeController::class, 'createAPI'])->name('employee.create');
Route::post('employee/read/', [EmployeeController::class, 'readAPI'])->name('employee.read');
Route::post('employee/update/', [EmployeeController::class, 'updateAPI'])->name('employee.update');
Route::post('employee/delete/', [EmployeeController::class, 'deleteAPI'])->name('employee.delete');