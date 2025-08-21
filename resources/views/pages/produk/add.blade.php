@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        Tambah Data Produk
    </div>
    <div class="card-body">
        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <!-- Nama Produk -->
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" name="nama_produk" 
                               class="form-control @error('nama_produk') is-invalid @enderror" 
                               value="{{ old('nama_produk') }}">
                        @error('nama_produk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Harga Produk -->
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">Harga Produk</label>
                        <input type="number" name="harga" 
                               class="form-control @error('harga') is-invalid @enderror" 
                               value="{{ old('harga') }}">
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>


            <!-- Deskripsi Produk -->
            <div class="mb-3">
                <label class="form-label">Deskripsi Produk</label>
                <textarea class="form-control @error('deskripsi_produk') is-invalid @enderror" 
                          name="deskripsi_produk" rows="3">{{ old('deskripsi_produk') }}</textarea>
                @error('deskripsi_produk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Upload Foto Produk -->
            <div class="mb-3">
                <label class="form-label">Foto Produk (opsional)</label>
                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">
                @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tombol -->
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
        </form>
    </div>
</div>
@endsection
