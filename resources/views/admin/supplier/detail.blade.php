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
                        <th>Nama Supplier</th>
                        <td>{{ $supplier->nama_supplier }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $supplier->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Nomor HP</th>
                        <td>{{ $supplier->nomor_hp }}</td>
                    </tr>
                    <tr>
                        <th>Dibuat Pada</th>
                        <td>{{ $supplier->created_at }}</td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ url('supplier')}}" class="btn btn-info">Kembali</a>
        </div>
    </div>
@endsection
