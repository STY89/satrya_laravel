@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        Edit Data Produk
    </div>
    <div class="card-body">
        <!-- Form update produk dengan upload foto -->
        <form action="{{ route('produk.update', $produk->id_produk) }}" 
              method="POST" 
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Nama Produk -->
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" name="nama_produk" 
                               class="form-control @error('nama_produk') is-invalid @enderror" 
                               value="{{ old('nama_produk', $produk->nama_produk) }}">
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
                               value="{{ old('harga', $produk->harga) }}">
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
                          name="deskripsi_produk" rows="3">{{ old('deskripsi_produk', $produk->deskripsi_produk) }}</textarea>
                @error('deskripsi_produk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Foto Produk Lama -->
            @if($produk->foto)
            <div class="mb-3">
                <label class="form-label">Foto Saat Ini</label><br>
                <img src="{{ asset('uploads/' . $produk->foto) }}" 
                     alt="Foto Produk" 
                     style="max-width:200px; max-height:150px; object-fit:cover;" 
                     class="rounded shadow">
            </div>
            @endif

            <!-- Upload Foto Baru -->
            <div class="mb-3">
                <label class="form-label">Ganti Foto Produk</label>
                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">
                @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tombol Simpan -->
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
