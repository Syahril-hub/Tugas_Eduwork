<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
// Route::get('/cart', [ProductController::class, 'cart'])->name('cart');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/products', function () {
    return view('products');
});

// Route::get('/cart', function () {
//     return view('cart');
// });
