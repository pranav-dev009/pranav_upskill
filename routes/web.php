<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;

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
    return view('layouts/app');
});

Route::get('/aboutus', function () {
    return view('aboutus/aboutus');
});

Route::get('/people/{id?}', function ($id) {
    return view('people.show', ['id' => $id]);
})->name('people.show');

Route::prefix('items')->group(function() {
    Route::get('/',[ItemsController::class, 'index'])->name('items.index');
    Route::get('/create',[ItemsController::class, 'create'])->name('items.create');
    Route::post('/store',[ItemsController::class, 'store'])->name('items.store');
    Route::get('/edit/{id?}',[ItemsController::class, 'edit'])->name('items.edit');
    Route::post('/update/{id?}',[ItemsController::class, 'update'])->name('items.update');
    Route::get('/destroy/{id?}',[ItemsController::class, 'destroy'])->name('items.destroy');
});

// Route::resource('item', ItemsController::class)
// ->only(['index', 'create', 'show', 'store', 'edit', 'update']);