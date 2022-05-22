@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">

    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <b>Produk</b>
                <h1>{{ $produk }}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <b>Supplier</b>
                <h1>{{ $supplier }}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <b>Pelanggan</b>
                <h1>{{ $pelanggan }}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-3">
         <div class="card">
            <div class="card-body">
                <b>Kategori</b>
                <h1>{{ $kategori }}</h1>
            </div>
        </div>
    </div>
</div>
@endsection
