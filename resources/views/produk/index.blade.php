@extends('layouts.main')

@section('title', 'Data Produk')

@section('content')
<div class="text-center">
    <h3>Data Produk</h3>
    <hr class="divider">
</div>
<div class="card border-0 shadow rounded mb-5">
    <div class="card-body">
        <a href="{{ route('produk.create') }}" class="btn btn-success mb-3">Tambah produk</a>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Nama produk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_produk as $produk)
                    <tr>
                        <td>{{ $produk->nama_produk }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                action="{{ route('produk.destroy', $produk->id) }}"
                                method="POST">
                                <a href="{{ route('produk.show', $produk->id) }}"
                                    class="btn btn-sm btn-warning">Show</a>
                                <a href="{{ route('produk.edit', $produk->id) }}"
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