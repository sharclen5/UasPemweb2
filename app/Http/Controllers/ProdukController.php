<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_produk = produk::latest()->get();
        return view('produk.index', compact('data_produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|min:5',
            'harga_produk' => 'required|numeric',
            'stok_produk' => 'required|numeric',
        ]);
        produk::create([
            'nama_produk' => $request->nama_produk,
            'harga_produk' => $request->harga_produk,
            'stok_produk' => $request->stok_produk,
        ]);
        return redirect()->route('produk.index')->with(['success' => 'Data produk berhasil ditambahkan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data_produk = produk::findOrFail($id);
        return view('produk.show', compact('data_produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data_produk = produk::findOrFail($id);
        return view('produk.edit', compact('data_produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_produk' => 'required|min:5',
            'harga_produk' => 'required|numeric',
            'stok_produk' => 'required|numeric',
        ]);
        $data_produk = produk::findOrFail($id);
        $data_produk->update([
            'nama_produk' => $request->nama_produk,
            'harga_produk' => $request->harga_produk,
            'stok_produk' => $request->stok_produk,
        ]);
        return redirect()->route('produk.index')->with(['success' => 'Data produk berhasil diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data_produk = produk::findOrFail($id);
        $data_produk->delete();
        return redirect()->route('produk.index')->with(['success' => 'Data produk berhasil dihapus!']);
    }
}
