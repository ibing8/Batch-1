<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/home', [HomeController::class, 'index']);

Route::get('/merchant', [MerchantController::class, 'index']);
Route::post('/merchant', [MerchantController::class, 'store']);
Route::put('/merchant/{id}/update', [MerchantController::class, 'update']);
Route::get('/merchant/{id}', [MerchantController::class, 'show']);
Route::delete('/merchant/{id}', [MerchantController::class, 'destroy']);

Route::get('/product', [ProductController::class, 'index']);
Route::post('/product', [ProductController::class, 'store']);
Route::put('/product/{id}/update', [ProductController::class, 'update']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::delete('/product/{id}', [ProductController::class, 'destroy']);
