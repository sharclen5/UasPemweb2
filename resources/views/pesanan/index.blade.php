@extends('layouts.main')

@section('title', 'Data Pesanan')

@section('content')
<div class="text-center">
    <h3>Data Pesanan</h3>
    <hr class="divider">
</div>
<div class="card border-0 shadow rounded mb-5">
    <div class="card-body">
        <a href="{{ route('pesanan.create') }}" class="btn btn-success mb-3">Tambah pesanan</a>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Nama pesanan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_pesanan as $pesanan)
                    <tr>
                        <td>{{ $pesanan->nama_pesanan }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                action="{{ route('pesanan.destroy', $pesanan->id) }}"
                                method="POST">
                                <a href="{{ route('pesanan.show', $pesanan->id) }}"
                                    class="btn btn-sm btn-warning">Show</a>
                                <a href="{{ route('pesanan.edit', $pesanan->id) }}"
                                    class="btn btn-sm btn-primary">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection