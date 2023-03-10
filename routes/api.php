<?php

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