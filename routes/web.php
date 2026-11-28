<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth', 'role:admin'])->group(function () { ... });

// Route::middleware(['auth', 'role:pembeli'])->group(function () { ... });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');

    Route::resource('produk', \App\Http\Controllers\Admin\ProdukController::class)
        ->except('show')
        ->names('admin.produk');
});

Route::middleware(['auth', 'role:pembeli'])->prefix('pembeli')->group(function () {
    Route::get('/dashboard', fn() => view('pembeli.dashboard'))->name('pembeli.dashboard');
});

