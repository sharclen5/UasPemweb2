@extends('layouts.main')

@section('title', 'Tambah Data pesanan')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow rounded">
                <div class="card-header bg-dark text-white">
                    <h5 class="card-title text-center">Tambah Data pesanan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('pesanan.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold">Nama pesanan</label>
                            <input type="text" class="form-control @error('nama_pesanan') is-invalid @enderror" name="nama_pesanan" value="{{ old('nama_pesanan') }}" placeholder="Masukkan Nama pesanan">
                            @error('nama_pesanan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                            <a href="{{ route('pesanan.index') }}" class="btn btn-md btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection