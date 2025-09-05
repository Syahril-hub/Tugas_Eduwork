<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
    //return "Selamat Datang di Toko Online Kami";
});

Route::get('/products', function () {
   return view('products');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/checkout', function () {
    return view('checkout');
});

// Route::get('/produk', function () {
//    return view('produk');
// });