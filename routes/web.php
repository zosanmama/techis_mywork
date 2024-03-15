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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {
    Route::get('/index', [App\Http\Controllers\ItemController::class, 'index'])->name('item.index');
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add'])->name('item.add');
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::get('/order', [App\Http\Controllers\ItemController::class, 'order'])->name('item.order');
});
