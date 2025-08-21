@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h1>Detail Produk</h1>

    <div class="card">
        <div class="card-body text-center">
            {{-- FOTO PRODUK DIATAS --}}
            @if($produk->foto)
                <div class="mb-3">
                    <img src="{{ asset('uploads/' . $produk->foto) }}" 
                         class="rounded shadow"
                         alt="Foto Produk" 
                         style="max-width:400px; max-height:200px; object-fit:cover;">
                </div>
            @else
                <div class="mb-3">
                    <img src="{{ asset('uploads/default.jpg') }}" 
                         class="rounded shadow"
                         alt="Default Produk" 
                         style="max-width:400px; max-height:200px; object-fit:cover;">
                </div>
            @endif

            {{-- NAMA PRODUK DAN DETAIL --}}
            <h4 class="card-title">{{ $produk->nama_produk }}</h4>
            <p><strong>Harga:</strong> {{ $produk->harga }}</p>
            <p><strong>Kategori:</strong> {{ $produk->kategori->nama_kategori ?? '-' }}</p>
            <p><strong>Deskripsi:</strong> {{ $produk->deskripsi_produk }}</p>
        </div>
    </div>

    <a href="{{ route('produk.index') }}" class="btn btn-primary mt-3">Kembali ke produk</a>
</div>
@endsection
