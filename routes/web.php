<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.beranda');
});

Route::get('/about', function () {
    return view('pages.about',[
        'nama'=> 'satrya pramudya',
        'absen'=> 43,
        'kelas'=> '12 rpl',
    ]);
});

Route::view('/contact', 'pages.contact');
