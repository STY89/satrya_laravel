<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController; // ✅ tambahkan ini

Route::get('/', function () {
    return view('pages.beranda');
});

Route::get('/about', function () {
    return view('pages.about', [
        'nama'=> 'satrya pramudya',
        'absen'=> 43,
        'kelas'=> '12 rpl',
    ]);
}); 

Route::view('/contact', 'pages.contact');
//satu controller banyak method
Route::get('/produk', [ProdukController::class, 'getProduk']);
Route::get('/produk/tambah', [ProdukController::class, 'tambahProduk']);
