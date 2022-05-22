@extends('layouts.app')
@section('content')
    <h2>Buat Supplier</h2>
  
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
            <form method="POST" action="{{ url('supplier', $supplier->id ) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_supplier">Nama Supplier</label>
                    <input type="text" class="form-control" name="nama_supplier" id="nama_supplier" value="{{ $supplier->nama_supplier }}">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10">
                        {{ $supplier->alamat }}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="nomor_hp">Nomor HP</label>
                    <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" value="{{ $supplier->nomor_hp }}">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Simpan</button>
                    <a href="{{ url('supplier')}}" class="btn btn-info">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
