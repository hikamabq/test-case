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
            <form method="POST" action="{{ url('transaksi') }}">
                @csrf
                <div class="form-group">
                    <label for="nota">Nota</label>
                    <input type="text" class="form-control" value="{{ $nota }}" name="nota" id="nota" readonly>
                </div>

                <div class="form-group">
                    <label for="id_produk">Produk</label>
                    <select class="produk form-control" name="id_produk"></select>
                </div>

                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" min="1" class="form-control" name="jumlah" id="jumlah">
                </div>

                <div class="form-group">
                    <button class="btn btn-success">Simpan</button>
                    <a href="{{ url('transaksi')}}" class="btn btn-info">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
