@extends('layouts.app')

@section('content')

    <h2>Transaksi</h2>
    <div class="card">
        <div class="card-body">
            <p>
                <a href="{{ url('transaksi/create')}}" class="btn btn-success">Tambah Transaksi</a>
            </p>  
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-responsive">
                <span>Showing {{ $transaksi->total() }} items</span>
                <div class="grid-view">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="w-50">No</th>
                                <th class="w-150">Nota</th>
                                <th class="w-200">Produk</th>
                                <th class="w-150">Jumlah</th>
                                <th class="w-200">Harga Total</th>
                                {{-- <th class="w-200">Tanggal</th> --}}
                                <th class="w-200">Opsi</th>
                            </tr>
                            <tr class="filters">
                                <form method="GET" action="{{ url('transaksi') }}">
                                    <td></td>
                                    <td>
                                        <input type="text" class="form-control" name="nota" value="<?= $_SESSION['nota'] ?>">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="id_produk" value="<?= $_SESSION['id_produk'] ?>">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="jumlah" value="<?= $_SESSION['jumlah'] ?>">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="harga_total" value="<?= $_SESSION['harga_total'] ?>">
                                    </td>
                                    {{-- <td></td> --}}
                                    {{-- <td>
                                        <input type="date" class="form-control" name="tanggal" min="2022-01-01" value="<?= $_SESSION['tanggal'] ?>">
                                    </td> --}}
                                    <td>
                                        <button class="btn btn-outline-dark btn-white">Search</button>
                                        <a href="{{ url('transaksi')}}" class="btn btn-secondary">Reset</a>
                                    </td>
                                </form>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($transaksi as $result => $data)
                            <tr>
                                <td>{{ $result + $transaksi->firstitem() }}</td>
                                <td>{{ $data->nota}}</td>
                                <td>{{ $data->nama_produk}}</td>
                                <td>{{ $data->jumlah}}</td>
                                <td>{{ number_format($data->harga_total) }}</td>
                                {{-- <td>{{ $data->created_at}}</td> --}}
                                <td>
                                    <a href="{{ route('transaksi.show', $data->id) }}" class="btn btn-icon">
                                        <i class="las la-eye"></i>
                                    </a>
                                    <form method="POST" action="{{ url('transaksi', $data->id ) }}" class="style-none">
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
            {{ $transaksi->links() }}
        </div>
    </div>

@endsection
