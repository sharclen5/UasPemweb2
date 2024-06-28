<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Produk;
use App\Models\Pesanan;

class pelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_pelanggan = pelanggan::with('produk', 'pesanan')->latest()->get();
        return view('pelanggan.index', compact('data_pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produk = Produk::all();
        $Pesanan = Pesanan::all();
        return view('pelanggan.create', compact('produk', 'Pesanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:5',
            'email' => 'required|email|unique:pelanggan,email',
            'no_hp' => 'required|numeric',
            'produk_id' => 'required|exists:produk,id',
            'Pesanan_id' => 'required|exists:Pesanan,id',
        ]);
        pelanggan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'produk_id' => $request->produk_id,
            'Pesanan_id' => $request->Pesanan_id,
        ]);
        return redirect()->route('pelanggan.index')->with(['success' => 'Data pelanggan berhasil ditambahkan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data_pelanggan = pelanggan::with('produk', 'Pesanan')->findOrFail($id);
        return view('pelanggan.show', compact('data_pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk = produk::all();
        $Pesanan = Pesanan::all();
        $data_pelanggan = pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('data_pelanggan', 'produk', 'Pesanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|min:5',
            'email' => 'required|email|unique:pelanggan,email',
            'no_hp' => 'required|numeric',
            'produk_id' => 'required|exists:produk,id',
            'Pesanan_id' => 'required|exists:Pesanan,id',
        ]);
        $data_pelanggan = pelanggan::findOrFail($id);
        $data_pelanggan->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'produk_id' => $request->produk_id,
            'Pesanan_id' => $request->Pesanan_id,
        ]);
        return redirect()->route('pelanggan.index')->with(['success' => 'Data pelanggan berhasil diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data_pelanggan = pelanggan::findOrFail($id);
        $data_pelanggan->delete();
        return redirect()->route('pelanggan.index')->with(['success' => 'Data pelanggan berhasil dihapus!']);
    }
}
