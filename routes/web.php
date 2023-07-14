<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\QtyController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Staff\DashboardController as StaffDashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\VarDumper\Caster\AmqpCaster;

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
    return redirect('/login');
});
Route::get('/home', function () {
    return redirect('/dashboard');
});
// Route::get('dashboard', [DashboardController::class, "index"]);
// Route::get('kategori', [KategoriController::class, "index"]);
// Route::get('produk', [ProdukController::class, "index"]);


// login route  
// Route::resource('login', LoginController::class);
Route::middleware(['guest'])->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('authenticate', [LoginController::class, 'authenticate']);
});
Route::get('logout', [LoginController::class, 'logout']);


// new route admin
Route::middleware(['auth'])->group(function () {
    Route::name('admin.')->group(function () {
        Route::name('kategori.')->group(function () {
            Route::resource('jenis', KategoriController::class);
            Route::resource('qty', QtyController::class);
        })->middleware('must-admin');
        Route::resource('dashboard', DashboardController::class);
        Route::resource('kategori', KategoriController::class);
        Route::resource('produk', ProdukController::class);
        Route::resource('user', UserController::class);
    });
});

Route::middleware(['auth'])->name('staff.')->group(function () {
    Route::resource('penjualan', PenjualanController::class);
    Route::resource('customer', CustomerController::class);
});

Route::get('cariproduk', [SearchController::class, 'cariproduk'])->name('cariproduk');
Route::get('/getprodukbyid/{kode}', [ProdukController::class, 'getprodukbyid']);
Route::post('/tambahkeranjang', [PenjualanController::class, 'tambahkeranjang'])->name('tambahkeranjang');
Route::delete('/deletekeranjang', [PenjualanController::class, 'delete_keranjang'])->name('deletekeranjang');
Route::get('checkout', [PenjualanController::class, 'checkout'])->name('checkout');
Route::post('simpan-transaksi', [PenjualanController::class, 'simpanTransaksi'])->name('simpantransaksi');
Route::post('kosongkankeranjang', [PenjualanController::class, 'kosongkanKeranjang'])->name('kosongkankeranjang');
Route::resource('laporan', LaporanController::class);
Route::get('export', [LaporanController::class, 'exportPDF'])->name('export');


// Route::name('staff.')->group(function () {
//     Route::resource('dashboard', StaffDashboardController::class);
// });

// masih sampai 1:00:00 / 1:30:25

// •
// Membuat Pagination

// tutorial dari channel : https://www.youtube.com/watch?v=3CbGQEO_d0M&t=36s



// cukup dulu 
// masih stak ga tau kenapa waktu bikin validation rule 
// malah sweet allertnya ikutan muncul karena sesi kali ya 
// di bagian penjualan customer role staff


// 01/07/2023 5.13 Am
// update baru sampai di penambahan view create transaksi baru
// masih belum ada bayangan jelas untuk prosesnya seperti apa, tapi
// mungkin niru konsep cart shopee, jadi jumalh barang dll di simpen di sana dan di edit di sana
// untuk sekarang coba dulu cari cara untuk live search dan memasukan barang ke cart.


// ketemu solusi pake jquery tapi func autocomplete ga mu jalan




// ==============================================================
// =================== JUMAT 1.41 AM ============================
// ==============================================================
// - create keranjang berhasil melalui session
// - delete item keranjang melalui id berhasil
// - fitur checkout sudah berjalan dan melakukan insert ke tabel detail_transaksi dan tabel penjualan

// next : 
// - buat fitur bersihkan keranjang | done 
// - nama produk di gabung dengan jenis toplesnya
// - pematangan qty dengan type dus, toples, paket, karena di rasa kurang
// - pada halaman transaksi lama , kode transaksi harusnya bisa di klik dan melihat isi detail transaksi nya. 
// - laporan

// (optional :)
// - stream_bucket_append

// tujuan :
// - laporan bentuk excel/pdf