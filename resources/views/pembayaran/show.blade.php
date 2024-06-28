@extends('layouts.main')

@section('title', 'Detail Data pembayaran')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-header bg-dark text-white">
                    <h4 class="card-title">Detail pembayaran</h4>
                </div>
                <div class="card-body">
                    <h5 class="card-subtitle mb-2 text-muted">Tanggal</h5>
                    <p class="card-text">{{ $data_pembayaran->tanggal }}</p>
                    <h5 class="card-subtitle mb-2 text-muted">Jam Masuk</h5>
                    <p class="card-text">{{ $data_pembayaran->jam_masuk }}</p>
                    <h5 class="card-subtitle mb-2 text-muted">Jam Keluar</h5>
                    <p class="card-text">{{ $data_pembayaran->jam_keluar }}</p>
                    <h5 class="card-subtitle mb-2 text-muted">pelanggan</h5>
                    <p class="card-text">{{ $data_pembayaran->pelanggan->nama }}</p>
                    <div class="text-center mt-4">
                        <a href="{{ route('pembayaran.index') }}" class="btn btn-md btn-danger">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection