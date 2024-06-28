@extends('layouts.main')

@section('title', 'Detail Data produk')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-header bg-dark text-white">
                    <h4 class="card-title">{{ $data_produk->nama_produk }}</h4>
                </div>
                <div class="card-body">
                    <div class="text-center mt-4">
                        <a href="{{ route('produk.index') }}" class="btn btn-md btn-danger">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection