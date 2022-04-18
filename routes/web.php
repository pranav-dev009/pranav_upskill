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
    return view('welcome');
});

Route::get('/aboutus', function () {
    return view('aboutus.aboutus');
});

Route::get('/people/{id?}', function ($id) {
    return view('people.show', ['id' => $id]);
})->name('people.show');

  
Route::resource('item', ItemsController::class)
->only(['index', 'create', 'show', 'store', 'edit', 'update', 'destory']);