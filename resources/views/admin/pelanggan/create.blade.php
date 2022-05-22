@extends('layouts.app')
@section('content')
    <h2>Buat Kategori Baru</h2>
  
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
            <form method="POST" action="{{ url('pelanggan') }}">
                @csrf
                <div class="form-group">
                    <label for="nama_pelanggan">Nama Pelanggan</label>
                    <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan">
                </div>
                <div class="form-group">
                    <label for="nomor_hp">Nomor HP</label>
                    <input type="text" class="form-control" name="nomor_hp" id="nomor_hp">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Simpan</button>
                    <a href="{{ url('pelanggan')}}" class="btn btn-info">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
