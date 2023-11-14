<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;

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

Route::get('/', function () {
    return view('admin.index');
});
// Route::get('/biodata', [BiodataController::class, 'show']);

// Route::get('/biodata', [BiodataController::class, 'show']);
// Route::get('/home', [HomeController::class, 'index']);

Route::prefix('product')->group(function(){
    Route::get('/view', [ProductsController::class, 'ProductView'])->name('products.view');
    Route::get('/add', [ProductsController::class, 'ProductAdd'])->name('products.add');
    Route::post('/store', [ProductsController::class, 'ProductStore'])->name('products.store');
    Route::get('/edit/{id}', [ProductsController::class, 'ProductEdit'])->name('products.edit');
    Route::post('/update/{id}', [ProductsController::class, 'ProductUpdate'])->name('products.update');
    Route::get('/delete/{id}', [ProductsController::class, 'ProductDelete'])->name('products.delete');
});