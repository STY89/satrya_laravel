<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function getProduk(){
        $data_murid = [
            'nama_murid'=>'satrya pramudya anandita',
            'absen_siswa'=>'43',
            'kelas_siswa'=>'12 rpl',
            'nisn_siswa'=>'123456789'
        ];
       return view('pages.produk')->with('data_murid', $data_murid);

    }      
    
    public function tambahProduk(){
        return view('pages.addproduk');
    }
}
