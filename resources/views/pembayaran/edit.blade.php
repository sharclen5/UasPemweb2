@extends('layouts.main')

@section('title', 'Edit Data pembayaran')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow rounded">
                <div class="card-header bg-dark text-white">
                    <h5 class="card-title text-center">Edit Data pembayaran</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('pembayaran.update', $data_pembayaran->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="font-weight-bold">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal', $data_pembayaran->tanggal) }}">
                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Jam Masuk</label>
                            <input type="time" class="form-control @error('jam_masuk') is-invalid @enderror" name="jam_masuk" value="{{ old('jam_masuk', $data_pembayaran->jam_masuk) }}">
                            @error('jam_masuk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Jam Keluar</label>
                            <input type="time" class="form-control @error('jam_keluar') is-invalid @enderror" name="jam_keluar" value="{{ old('jam_keluar', $data_pembayaran->jam_keluar) }}">
                            @error('jam_keluar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">pelanggan</label>
                            <select class="form-control @error('pelanggan_id') is-invalid @enderror" name="pelanggan_id">
                                <option value="">Pilih pelanggan</option>
                                @foreach ($pelanggan as $plg)
                                    <option value="{{ $plg->id }}" {{ old('pelanggan_id', $data_pembayaran->pelanggan_id) == $plg->id ? 'selected' : '' }}>{{ $plg->nama }}</option>
                                @endforeach
                            </select>
                            @error('pelanggan_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                            <a href="{{ route('pembayaran.index') }}" class="btn btn-md btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection