<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CompanyController;

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
    return view('login.index');
})->middleware('customcheck');

Route::get('/aboutus', function () {
    return view('aboutus.aboutus');
})->middleware('customcheck');

Route::get('/people/{id?}', function ($id=null) {
    return view('people.show', ['id' => $id]);
})->name('people.show')->middleware('customcheck');

Route::prefix('login')->group(function() {
    Route::get('/',[LoginController::class, 'index'])->name('login.index')->middleware('customcheck');
    Route::post('/auth',[LoginController::class, 'auth'])->name('login.auth');
    Route::get('/store',[RegisterController::class, 'store'])->name('register.store');
});

Route::prefix('register')->group(function() {
    Route::get('/', [RegisterController::class, 'index'])->name('register.index')->middleware('customcheck');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.register');
    // Route::post('/register', [RegisterController::class, 'register'])->middleware(['auth', 'verified'])->name('register.register');
});

Route::prefix('items')->group(function() {
    Route::get('/',[ItemsController::class, 'index'])->name('items.index')->middleware('customcheck');
    Route::get('/create',[ItemsController::class, 'create'])->name('items.create')->middleware('customcheck');
    Route::post('/store',[ItemsController::class, 'store'])->name('items.store');
    Route::get('/edit/{id?}',[ItemsController::class, 'edit'])->name('items.edit')->middleware('customcheck');
    Route::post('/update/{id?}',[ItemsController::class, 'update'])->name('items.update');
    Route::get('/destroy/{id?}',[ItemsController::class, 'destroy'])->name('items.destroy')->middleware('customcheck');
});

Route::prefix('logout')->group(function() {
    Route::get('/', [LoginController::class, 'logout'])->name('login.logout');
});

//google login
Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('loginCallback.google');

//google login
Route::get('login/facebook', [LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [LoginController::class, 'handleFacebookCallback'])->name('loginCallback.facebook');

Route::prefix('company')->group(function() {
    Route::get('/',[CompanyController::class, 'index'])->name('company.index')->middleware('customcheck');
    Route::get('/create',[CompanyController::class, 'create'])->name('company.create')->middleware('customcheck');
    Route::post('/store',[CompanyController::class, 'store'])->name('company.store');
    Route::get('/edit/{id?}',[CompanyController::class, 'edit'])->name('company.edit')->middleware('customcheck');
    Route::post('/update/{id?}',[CompanyController::class, 'update'])->name('company.update');
    Route::get('/destroy/{id?}',[CompanyController::class, 'destroy'])->name('company.destroy')->middleware('customcheck');
});

Route::prefix('employee')->group(function() {
    Route::get('/',[EmployeeController::class, 'index'])->name('employee.index')->middleware('customcheck');
    Route::get('/create',[EmployeeController::class, 'create'])->name('employee.create')->middleware('customcheck');
    Route::post('/store',[EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/edit/{id?}',[EmployeeController::class, 'edit'])->name('employee.edit')->middleware('customcheck');
    Route::post('/update/{id?}',[EmployeeController::class, 'update'])->name('employee.update');
    Route::get('/destroy/{id?}',[EmployeeController::class, 'destroy'])->name('employee.destroy')->middleware('customcheck');
});