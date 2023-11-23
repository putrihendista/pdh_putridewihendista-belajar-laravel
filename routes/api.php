<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

Route::post('products', [AuthController::class, 'createproducts']);
Route::get('products', [AuthController::class, 'read']);
Route::get('/products/{id}', [AuthController::class, 'readbyId']);
Route::put('/productsUpdate/{id}', [AuthController::class, 'updateproducts']);
Route::delete('/productsDelete/{id}', [AuthController::class, 'deletebyId']);
