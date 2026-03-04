<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\StockEntries_Controller;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
Route::get('/suppliers/{id}', [SupplierController::class, 'show'])->name('suppliers.show');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');

Route::get('/stock-entries/create', [StockEntries_Controller::class, 'create'])->name('stock.create');
Route::post('/stock-entries', [StockEntries_Controller::class, 'store'])->name('stock.store');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');