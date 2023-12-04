<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::prefix('product')->group(function(){
    Route::get('/view', [ProductsController::class, 'ProductView'])->name('products.view');
    Route::get('/add', [ProductsController::class, 'ProductAdd'])->name('products.add');
    Route::post('/store', [ProductsController::class, 'ProductStore'])->name('products.store');
    Route::get('/edit/{id}', [ProductsController::class, 'ProductEdit'])->name('products.edit');
    Route::post('/update/{id}', [ProductsController::class, 'ProductUpdate'])->name('products.update');
    Route::get('/delete/{id}', [ProductsController::class, 'ProductDelete'])->name('products.delete');
    Route::get('/chart', [ProductsController::class,'chart'])->name('products.chart');
});
