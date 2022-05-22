@extends('layouts.app')
@section('content')
    <h2>Edit Produk</h2>
  
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
            <form method="POST" action="{{ url('produk', $produk->id ) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="{{ $produk->nama_produk }}">
                </div>
                <div class="form-group">
                    <label for="deskripsi_produk">Deskripsi Produk</label>
                    <textarea name="deskripsi_produk" id="deskripsi_produk" class="form-control">
                        {{ $produk->deskripsi_produk }}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="harga_produk">Harga Produk</label>
                    <input type="number" min="0" class="form-control" name="harga_produk" id="harga_produk" value="{{ $produk->harga_produk }}">
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" min="0" class="form-control" name="stok" id="stok" value="{{ $produk->stok }}">
                </div>
                <div class="form-group">
                    <label for="id_kategori">Kategori</label>
                    <select name="id_kategori" id="id_kategori" class="form-control">
                        @foreach ($kategori as $data)
                        <option value="{{ $data->id }}" <?= ($produk->id_kategori == $data->id) ? "selected" : ""?>>{{ $data->kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_supplier">Supplier</label>
                    <select name="id_supplier" id="id_supplier" class="form-control">
                        @foreach ($supplier as $data)
                        <option value="{{ $data->id }}" <?= ($produk->id_supplier == $data->id) ? "selected" : ""?>>{{ $data->nama_supplier }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Simpan</button>
                    <a href="{{ url('produk')}}" class="btn btn-info">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
