<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'tb_kategori';

    // Kolom yang boleh diisi massal
    protected $fillable = ['nama_kategori'];
}
