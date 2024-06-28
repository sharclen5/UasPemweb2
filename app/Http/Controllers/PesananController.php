<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_pesanan = pesanan::latest()->get();
        return view('pesanan.index', compact('data_pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pesanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pesanan' => 'required|min:5',
        ]);
        Pesanan::create([
            'nama_pesanan' => $request->nama_pesanan,
        ]);
        return redirect()->route('pesanan.index')->with(['success' => 'Data pesanan berhasil ditambahkan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data_pesanan = pesanan::findOrFail($id);
        return view('pesanan.show', compact('data_pesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data_pesanan = pesanan::findOrFail($id);
        return view('pesanan.edit', compact('data_pesanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_pesanan' => 'required|min:5',
        ]);
        $data_pesanan = pesanan::findOrFail($id);
        $data_pesanan->update([
            'nama_pesanan' => $request->nama_pesanan,
        ]);
        return redirect()->route('pesanan.index')->with(['success' => 'Data pesanan berhasil diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data_pesanan = pesanan::findOrFail($id);
        $data_pesanan->delete();
        return redirect()->route('pesanan.index')->with(['success' => 'Data pesanan berhasil dihapus!']);
    }
}
