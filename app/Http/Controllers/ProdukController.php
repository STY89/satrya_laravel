<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;

class ProdukController extends Controller
{
    // INDEX + PENCARIAN
    public function index(Request $request)
    {
        $query = Produk::query();

        // Jika ada keyword pencarian
        if ($request->has('search') && $request->search != '') {
            $query->where('nama_produk', 'like', '%' . $request->search . '%')
                  ->orWhere('deskripsi_produk', 'like', '%' . $request->search . '%');
        }

        $data_produk = $query->get();

        return view('pages.produk.index', compact('data_produk'));
    }

    // HALAMAN TAMBAH PRODUK
    public function create()
    {
        $kategori = Kategori::all();
        return view('pages.produk.add', compact('kategori'));
    }

    // SIMPAN PRODUK BARU
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi_produk' => 'required|string',
            'kategori_id' => 'nullable|exists:kategori,id_kategori',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $data = [
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'deskripsi_produk' => $request->deskripsi_produk,
            'kategori_id' => $request->kategori_id ?? 1, // default kategori 1
        ];

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['foto'] = $filename;
        }

        Produk::create($data);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    // HALAMAN DETAIL PRODUK
    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('pages.produk.show', compact('produk'));
    }

    // HALAMAN EDIT PRODUK
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('pages.produk.edit', compact('produk', 'kategori'));
    }

    // UPDATE PRODUK
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi_produk' => 'required|string',
            'kategori_id' => 'nullable|exists:kategori,id_kategori',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $produk = Produk::findOrFail($id);

        $data = [
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'deskripsi_produk' => $request->deskripsi_produk,
            'kategori_id' => $request->kategori_id ?? 1, // default kategori 1
        ];

        if ($request->hasFile('foto')) {
            if ($produk->foto && file_exists(public_path('uploads/' . $produk->foto))) {
                unlink(public_path('uploads/' . $produk->foto));
            }

            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['foto'] = $filename;
        }

        $produk->update($data);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    // HAPUS PRODUK
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->foto && file_exists(public_path('uploads/' . $produk->foto))) {
            unlink(public_path('uploads/' . $produk->foto));
        }

        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
