@extends('layouts.main')

@section('title', 'Detail Data pelanggan')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-header bg-dark text-white">
                    <h4 class="card-title">{{ $data_pelanggan->nama }}</h4>
                </div>
                <div class="card-body">
                    <h5 class="card-subtitle mb-2 text-muted">Email</h5>
                    <p class="card-text">{{ $data_pelanggan->email }}</p>
                    <h5 class="card-subtitle mb-2 text-muted">Nomor Telepon</h5>
                    <p class="card-text">{{ $data_pelanggan->no_telp }}</p>
                    <div class="text-center mt-4">
                        <a href="{{ route('pelanggan.index') }}" class="btn btn-md btn-danger">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection