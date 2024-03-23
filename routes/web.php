<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index'])->name('item.index');
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add'])->name('item.add');
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::get('/items/{item}', [App\Http\Controllers\ItemController::class, 'show'])->name('item.show');
    Route::get('/items/{item}/edit', [App\Http\Controllers\ItemController::class, 'edit'])->name('item.edit');
    Route::post('/items/{item}/edit', [App\Http\Controllers\ItemController::class, 'update'])->name('item.update');
    Route::delete('/items/{item}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('item.destroy');
    Route::get('/order', [App\Http\Controllers\ItemController::class, 'order'])->name('item.order');
});
