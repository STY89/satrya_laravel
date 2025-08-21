<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

// Halaman Beranda
Route::get('/', function () {
    return view('pages.beranda');
});

// Halaman About
Route::get('/about', function () {
    return view('pages.about', [
        'nama'=> 'Satrya Pramudya',
        'absen'=> 43,
        'kelas'=> '12 RPL',
    ]);
});

// Halaman Contact
Route::view('/contact', 'pages.contact');

// CRUD Produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index'); // menampilkan semua produk

Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create'); // menampilkan form tambah produk

Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store'); // menyimpan data produk baru

// Rute BARU untuk menampilkan detail produk
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');

Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit'); // menampilkan form edit produk

Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update'); // update data produk

Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy'); // hapus produk
