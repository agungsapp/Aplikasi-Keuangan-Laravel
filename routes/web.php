<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\QtyController;
use App\Http\Controllers\UserController;
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
    return redirect('/dashboard');
});
// Route::get('dashboard', [DashboardController::class, "index"]);
// Route::get('kategori', [KategoriController::class, "index"]);
// Route::get('produk', [ProdukController::class, "index"]);

// new route
Route::name('admin.')->group(function () {
    Route::name('kategori.')->group(function () {
        Route::resource('jenis', KategoriController::class);
        Route::resource('qty', QtyController::class);
    });
    Route::resource('dashboard', DashboardController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('user', UserController::class);
});


// masih sampai 1:00:00 / 1:30:25

// •
// Membuat Pagination

// tutorial dari channel : https://www.youtube.com/watch?v=3CbGQEO_d0M&t=36s