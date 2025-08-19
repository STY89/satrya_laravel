<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // <-- ini yang belum ada
use Illuminate\Support\Str;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_produk')->insert([
            [
            'nama_produk' => 'Smart TV Samsung 24 Inch',
            'harga' => 15000000,
            'deskripsi_produk' => 'Ini adalah deskripsi dummy',
            'kategori_id' => 2,
            'created_at'=>now()
        ],[
            'nama_produk' => 'laptop hp',
            'harga' => 35000000,
            'deskripsi_produk' => 'Ini adalah deskripsi dummy',
            'kategori_id' => 2,
            'created_at'=>now()
        ],[
            'nama_produk' => 'kulkas ai',
            'harga' => 25000000,
            'deskripsi_produk' => 'Ini adalah deskripsi dummy',
            'kategori_id' => 2,
            'created_at'=>now()
            ]
        ]);
    }
}
