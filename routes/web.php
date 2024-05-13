<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerUser;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ControllerUser::class, 'viewLogin']);
Route::get('/register', [ControllerUser::class, 'viewRegister']);
Route::post('/', [ControllerUser::class, 'login']);
Route::post('/logout', [ControllerUser::class, 'logout']);
Route::post('/register', [ControllerUser::class, 'register']);

Route::get('/home', [ControllerUser::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/store', [StoreController::class, 'index']);
    Route::get('/storeProfile', [StoreController::class, 'viewStore']);
    Route::get('/storeCategory/{storeId}/{categoryId}', [CategoryController::class, 'productByIdStore']);
    Route::post('/storeProfile', [CategoryController::class, 'addCategory']);
    Route::post('/store', [StoreController::class, 'createStore']);

    Route::post('/storeCategory/{storeId}/{categoryId}', [ProductController::class, 'storeAddProduct']);
    Route::delete('/deleteProduct/{productId}', [ProductController::class, 'deleteProduct']);
    Route::post('/editProduct/{productId}', [ProductController::class, 'editProduct']);

    Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
});

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{name}', [CategoryController::class, 'productByCategory']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{productId}', [ProductController::class, 'getProductById']);