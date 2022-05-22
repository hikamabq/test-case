@extends('layouts.app')
@section('content')
    <h2>Buat Produk Baru</h2>
  
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif
    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ url('produk') }}">
                @csrf
                <div class="form-group">
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" class="form-control" name="nama_produk" id="nama_produk">
                </div>
                
                <div class="form-group">
                    <label for="deskripsi_produk">Deskripsi Produk</label>
                    <textarea name="deskripsi_produk" id="deskripsi_produk" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="harga_produk">Harga Produk</label>
                    <input type="number" min="0" class="form-control" name="harga_produk" id="harga_produk">
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" min="0" class="form-control" name="stok" id="stok">
                </div>
                <div class="form-group">
                    <label for="id_kategori">Kategori</label>
                    <select class="kategori form-control" name="id_kategori"></select>
                </div>
                <div class="form-group">
                    <label for="id_supplier">Supplier</label>
                    <select class="supplier form-control" name="id_supplier"></select>
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Simpan</button>
                    <a href="{{ url('produk')}}" class="btn btn-info">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
