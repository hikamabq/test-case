@extends('layouts.app')

@section('content')

    <h2>Data Produk</h2>
    <div class="card">
        <div class="card-body">
            <p>
                <a href="{{ url('produk/create')}}" class="btn btn-success">Tambah Produk</a>
            </p>  
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-responsive">
                <span>Showing {{ $produk->total() }} items</span>
                <div class="grid-view">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="w-50">No</th>
                                <th class="w-150">Nama Produk</th>
                                <th class="w-150">Harga Produk</th>
                                <th class="w-150">Stok</th>
                                <th class="w-150">Kategori</th>
                                <th class="w-150">Supplier</th>
                                <th class="w-200">Opsi</th>
                            </tr>
                            <tr class="filters">
                                <form method="GET" action="{{ url('produk') }}">
                                    <td></td>
                                    <td>
                                        <input type="text" class="form-control" name="nama_produk" value="<?= $_SESSION['nama_produk'] ?>">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="harga_produk" value="<?= $_SESSION['harga_produk'] ?>">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="stok" value="<?= $_SESSION['stok'] ?>">
                                    </td>
                                    <td>
                                        <select name="kategori" id="kategori" class="form-control">
                                            <option value=""></option>
                                            @foreach($kategori as $data)
                                            <option value="{{$data->kategori}}" <?= ($_SESSION['kategori'] == $data->kategori) ? "selected" : ""?>>{{$data->kategori}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select name="supplier" id="supplier" class="form-control">
                                            <option value=""></option>
                                            @foreach($supplier as $data)
                                            <option value="{{$data->nama_supplier}}" <?= ($_SESSION['supplier'] == $data->nama_supplier) ? "selected" : ""?>>{{$data->nama_supplier}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-dark btn-white">Search</button>
                                        <a href="{{ url('produk')}}" class="btn btn-secondary">Reset</a>
                                    </td>
                                </form>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($produk as $result => $data)
                            <tr>
                                <td>{{ $result + $produk->firstitem() }}</td>
                                <td>{{ $data->nama_produk}}</td>
                                <td>{{ number_format($data->harga_produk) }}</td>
                                <td>{{ $data->stok}}</td>
                                <td>{{ $data->kategori}}</td>
                                <td>{{ $data->nama_supplier}}</td>
                                <td>
                                    <a href="{{ route('produk.show', $data->id) }}" class="btn btn-icon">
                                        <i class="las la-eye"></i>
                                    </a>
                                    <a href="{{ route('produk.edit', $data->id) }}" class="btn btn-icon">
                                        <i class="las la-pencil-alt"></i>
                                    </a>
                                    <form method="POST" action="{{ url('produk', $data->id ) }}" class="style-none">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-icon"><i class="las la-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $produk->links() }}
        </div>
    </div>

@endsection
