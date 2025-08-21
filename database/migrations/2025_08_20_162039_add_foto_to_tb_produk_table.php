<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('tb_produk', function (Blueprint $table) {
            $table->string('foto')->nullable()->after('harga'); // ganti 'deskripsi' menjadi 'harga' atau kolom yang ada
        });
    }

    public function down(): void
    {
        Schema::table('tb_produk', function (Blueprint $table) {
            $table->dropColumn('foto');
        });
    }
};
