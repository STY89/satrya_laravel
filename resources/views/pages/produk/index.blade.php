@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3">Daftar Produk</h1>

    <div class="alert alert-info" role="alert">
        NAMA: SATRYA Pramudya, 
        ABSEN: 43, 
        KELAS: 12 RPL 1
    </div>

    <a href="{{ route('produk.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>

    <!-- Form Pencarian -->
    <form action="{{ route('produk.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari produk..." value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Cari</button>
        </div>
    </form>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($data_produk->isEmpty())
        <p>Tidak ada produk.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_produk as $index => $produk)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>{{ $produk->harga }}</td>
                    <td>{{ $produk->deskripsi_produk }}</td>
                    <td>
                        <a href="{{ route('produk.edit', $produk->id_produk) }}" class="btn btn-warning btn-sm">Edit</a>
                        
                        <form action="{{ route('produk.destroy', $produk->id_produk) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin mau hapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                        
                        <a href="{{ route('produk.show', $produk->id_produk) }}" class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
