@extends('layouts.app')

@section('content')

    <h2>Data Kategori</h2>
    <div class="card">
        <div class="card-body">
            <p>
                <a href="{{ url('kategori/create')}}" class="btn btn-success">Tambah Kategori</a>
            </p>  
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}
                </div>
            @endif
            <div class="table-responsive">
                <span>Showing {{ $kategori->total() }} items</span>
                <div class="grid-view">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="w-50">No</th>
                                <th class="w-250">Kategori</th>
                                <th class="w-150">Opsi</th>
                            </tr>
                            <tr class="filters">
                                <form method="GET" action="{{ url('kategori') }}">
                                    <td></td>
                                    <td>
                                        <input type="text" class="form-control" name="kategori" value="<?= $_SESSION['kategori'] ?>">
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-dark btn-white">Search</button>
                                        <a href="{{ url('kategori')}}" class="btn btn-secondary">Reset</a>
                                    </td>
                                </form>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($kategori as $result => $data)
                        <tr>
                            <td>{{ $result + $kategori->firstitem() }}</td>
                            <td>{{ $data->kategori}}</td>
                            <td>
                                <a href="{{ route('kategori.show', $data->id) }}" class="btn btn-icon">
                                        <i class="las la-eye"></i>
                                    </a>
                                <a href="{{ route('kategori.edit', $data->id) }}" class="btn btn-icon">
                                    <i class="las la-pencil-alt"></i>
                                </a>
                                <form method="POST" action="{{ url('kategori', $data->id ) }}" class="style-none">
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
            {{ $kategori->links() }}
        </div>
    </div>

@endsection
