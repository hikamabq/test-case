@extends('layouts.app')

@section('content')

    <h2>Data Supplier</h2>
    <div class="card">
        <div class="card-body">
            <p>
                <a href="{{ url('supplier/create')}}" class="btn btn-success">Tambah Supplier</a>
            </p>  
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-responsive">
                <span>Showing {{ $supplier->total() }} items</span>
                <div class="grid-view">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="w-50">No</th>
                                <th class="w-200">Nama Supplier</th>
                                <th class="w-200">Alamat</th>
                                <th class="w-200">Nomor HP</th>
                                <th class="w-150">Opsi</th>
                            </tr>
                            <tr class="filters">
                                <form method="GET" action="{{ url('supplier') }}">
                                    <td></td>
                                    <td>
                                        <input type="text" class="form-control" name="nama_supplier" value="<?= $_SESSION['nama_supplier'] ?>">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="alamat" value="<?= $_SESSION['alamat'] ?>">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="nomor_hp" value="<?= $_SESSION['nomor_hp'] ?>">
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-dark btn-white">Search</button>
                                        <a href="{{ url('supplier')}}" class="btn btn-secondary">Reset</a>
                                    </td>
                                </form>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($supplier as $result => $data)
                            <tr>
                                <td>{{ $result + $supplier->firstitem() }}</td>
                                <td>{{ $data->nama_supplier}}</td>
                                <td>{{ $data->alamat}}</td>
                                <td>{{ $data->nomor_hp}}</td>
                                <td>
                                    <a href="{{ route('supplier.show', $data->id) }}" class="btn btn-icon">
                                        <i class="las la-eye"></i>
                                    </a>
                                    <a href="{{ route('supplier.edit', $data->id) }}" class="btn btn-icon">
                                        <i class="las la-pencil-alt"></i>
                                    </a>
                                    <form method="POST" action="{{ url('supplier', $data->id ) }}" class="style-none">
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
            {{ $supplier->links() }}
        </div>
    </div>

@endsection
