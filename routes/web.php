<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PembayaranController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index')->middleware('auth');
Route::get('/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create')->middleware('auth');
Route::post('/pelanggan', [PelangganController::class, 'store'])->name('pelanggan.store')->middleware('auth');
Route::get('/pelanggan/{pelanggan}', [PelangganController::class, 'show'])->name('pelanggan.show')->middleware('auth');
Route::get('/pelanggan/{pelanggan}/edit', [PelangganController::class, 'edit'])->name('pelanggan.edit')->middleware('auth');
Route::put('/pelanggan/{pelanggan}', [PelangganController::class, 'update'])->name('pelanggan.update')->middleware('auth');
Route::delete('/pelanggan/{pelanggan}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy')->middleware('auth');

Route::get('/produk', [produkController::class, 'index'])->name('produk.index')->middleware('auth');
Route::get('/produk/create', [produkController::class, 'create'])->name('produk.create')->middleware('auth');
Route::post('/produk', [produkController::class, 'store'])->name('produk.store')->middleware('auth');
Route::get('/produk/{produk}', [produkController::class, 'show'])->name('produk.show')->middleware('auth');
Route::get('/produk/{produk}/edit', [produkController::class, 'edit'])->name('produk.edit')->middleware('auth');
Route::put('/produk/{produk}', [produkController::class, 'update'])->name('produk.update')->middleware('auth');
Route::delete('/produk/{produk}', [produkController::class, 'destroy'])->name('produk.destroy')->middleware('auth');

Route::get('/pesanan', [pesananController::class, 'index'])->name('pesanan.index')->middleware('auth');
Route::get('/pesanan/create', [pesananController::class, 'create'])->name('pesanan.create')->middleware('auth');
Route::post('/pesanan', [pesananController::class, 'store'])->name('pesanan.store')->middleware('auth');
Route::get('/pesanan/{pesanan}', [pesananController::class, 'show'])->name('pesanan.show')->middleware('auth');
Route::get('/pesanan/{pesanan}/edit', [pesananController::class, 'edit'])->name('pesanan.edit')->middleware('auth');
Route::put('/pesanan/{pesanan}', [pesananController::class, 'update'])->name('pesanan.update')->middleware('auth');
Route::delete('/pesanan/{pesanan}', [pesananController::class, 'destroy'])->name('pesanan.destroy')->middleware('auth');

Route::get('/pembayaran', [pembayaranController::class, 'index'])->name('pembayaran.index')->middleware('auth');
Route::get('/pembayaran/create', [pembayaranController::class, 'create'])->name('pembayaran.create')->middleware('auth');
Route::post('/pembayaran', [pembayaranController::class, 'store'])->name('pembayaran.store')->middleware('auth');
Route::get('/pembayaran/{pembayaran}', [pembayaranController::class, 'show'])->name('pembayaran.show')->middleware('auth');
Route::get('/pembayaran/{pembayaran}/edit', [pembayaranController::class, 'edit'])->name('pembayaran.edit')->middleware('auth');
Route::put('/pembayaran/{pembayaran}', [pembayaranController::class, 'update'])->name('pembayaran.update')->middleware('auth');
Route::delete('/pembayaran/{pembayaran}', [pembayaranController::class, 'destroy'])->name('pembayaran.destroy')->middleware('auth');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

require __DIR__.'/auth.php';
