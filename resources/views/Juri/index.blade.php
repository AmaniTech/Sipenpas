@extends('layouts.main')

@section('title')
| Data Juri
@endsection

@section('main')
        <div class="app-content-header">
            <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"><h3 class="mb-0">Data Juri</h3></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Juri</li>
                    </ol>
                </div>
            </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse" title="Collapse">
                                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-lte-toggle="card-remove" title="Remove">
                                        <i class="bi bi-x-lg"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addJuri">Tambah Data</button>
                                
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Juri</th>
                                            <th scope="col">Dibuat Pada</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($juri as $j)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$j->nama}}</td>
                                                <td>{{$j->created_at}}</td>
                                                <td>
                                                    <button href='' class="btn btn-warning border border-white" data-bs-toggle="modal" data-bs-target="#ejuri_{{$j->id}}">Edit</button>
                                                    <form action="/d/juri/{{$j->id}}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger border border-white">Delete</button>
                                                    </form>

                                                </td>
                                            </tr>

                                            <div class="modal fade" id="ejuri_{{$j->id}}" tabindex="-1" aria-labelledby="ejuri_{{$j->id}}Label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="ejuri_{{$j->id}}Label">Edit Data</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('juri.delete', $j->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-3">
                                                                <label for="nama_juri" class="form-label">Nama Juri</label>
                                                                <input type="text" class="form-control" id="nama_juri" name="juri" value="{{$j->nama}}">
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="addJuri" tabindex="-1" aria-labelledby="addJuriLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addJuriLabel">Tambah Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                <div class="modal-body">
                    <form action="/a/juri" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_juri" class="form-label">Nama Juri</label>
                            <input type="text" class="form-control" id="nama_juri" name="juri">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
@endsection


@section('js')
@endsection
