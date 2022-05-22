@extends('layouts.app')
@section('content')
    <h2>Detail Supplier</h2>
  
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered detail-view">
                <tbody>
                    <tr>
                        <th>Nama Produk</th>
                        <td>{{ $produk->nama_produk }}</td>
                    </tr>
                    <tr>
                        <th>Stok</th>
                        <td>{{ $produk->stok }}</td>
                    </tr>
                    <tr>
                        <th>Harga Produk</th>
                        <td>{{ $produk->harga_produk }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $produk->deskripsi_produk }}</td>
                    </tr>
                    <tr>
                        <th>Dibuat Pada</th>
                        <td>{{ $produk->created_at }}</td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ url('produk')}}" class="btn btn-info">Kembali</a>
        </div>
    </div>
@endsection
