<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Middleware\AdminMiddleware;

// WEBSITE
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/collection', [HomeController::class, 'collection'])->name('collection');
Route::get('/product/{id}', [HomeController::class, 'detail'])->name('product.detail');

// ADMIN LOGIN
Route::get('/admin/login', [AuthController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AuthController::class, 'login'])
    ->name('admin.login.submit');

// ADMIN AREA
Route::prefix('admin')->name('admin.')->middleware(AdminMiddleware::class)->group(function () {

    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::resource('produk', ProdukController::class)->except(['show']);
    Route::resource('kategori', KategoriController::class);
});
