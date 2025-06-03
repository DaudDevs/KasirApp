<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;
//router dengan  mode resources

// product
route::resource('products', ProductController::class);

// transaksi
Route::resource('transaksi', TransaksiController::class);

// laporan
Route::resource('laporan', LaporanController::class);

Route::resource('/', HomeController::class);


    // Route::get('/', function () {
    //     return view('home');
    // });

