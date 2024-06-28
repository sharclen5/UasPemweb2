@extends('layouts.main')

@section('title', 'Data pembayaran')

@section('content')
<div class="text-center">
    <h3>Data pembayaran</h3>
    <hr class="divider">
</div>
<div class="card border-0 shadow rounded mb-5">
    <div class="card-body">
        <a href="{{ route('pembayaran.create') }}" class="btn btn-success mb-3">Tambah pembayaran</a>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Total</th>
                    <th>Pelanggan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_pembayaran as $pembayaran)
                    <tr>
                        <td>{{ $pembayaran->total }}</td>
                        <td>{{ $pembayaran->pelanggan->nama }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                action="{{ route('pembayaran.destroy', $pembayaran->id) }}"
                                method="POST">
                                <a href="{{ route('pembayaran.show', $pembayaran->id) }}"
                                    class="btn btn-sm btn-warning">Show</a>
                                <a href="{{ route('pembayaran.edit', $pembayaran->id) }}"
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