<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Pelanggan;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_pembayaran = Pembayaran::with('pelanggan')->latest()->get();
        return view('pembayaran.index', compact('data_pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pelanggan = Pelanggan::all();
        return view('pembayaran.create', compact('pelanggan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggan,id',
            'total_pembayaran' => 'required|numeric',
        ]);
        pembayaran::create([
            'pelanggan_id' => $request->pelanggan_id,
            'total_pembayaran' => $request->total_pembayaran,
        ]);
        return redirect()->route('pembayaran.index')->with(['success' => 'Data pembayaran berhasil ditambahkan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data_pembayaran = pembayaran::with('pelanggan')->findOrFail($id);
        return view('pembayaran.show', compact('data_pembayaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pelanggan = pelanggan::all();
        $data_pembayaran = pembayaran::findOrFail($id);
        return view('pembayaran.edit', compact('data_pembayaran', 'pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggan,id',
            'total_pembayaran' => 'required|numeric',
        ]);
        $data_pembayaran = pembayaran::findOrFail($id);
        $data_pembayaran->update([
            'pelanggan_id' => $request->pelanggan_id,
            'total_pembayaran' => $request->total_pembayaran,
        ]);
        return redirect()->route('pembayaran.index')->with(['success' => 'Data pembayaran berhasil diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data_pembayaran = pembayaran::findOrFail($id);
        $data_pembayaran->delete();
        return redirect()->route('pembayaran.index')->with(['success' => 'Data pembayaran berhasil dihapus!']);
    }
}
