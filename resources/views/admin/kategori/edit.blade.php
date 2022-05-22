@extends('layouts.app')
@section('content')
    <h2>Edit Kategori</h2>
  
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
            <form method="POST" action="{{ url('kategori', $kategori->id ) }}">
                @csrf
                @method('PUT')
                <label for="">Kategori</label>
                <input name="kategori" value="{{ $kategori->kategori }}" type="text" class="form-control"> 
                <br>
                <button class="btn btn-success">Simpan</button>
                <a href="{{ url('kategori ')}}" class="btn btn-info">Kembali</a>
            </form>
        </div>
    </div>
@endsection
