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
                                <button type="button" class="btn btn-primary mb-3" >Tambah Data</button>
                                
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
                                                    <a href='/juri/{{$j->id}}' class="btn btn-warning border border-white tombol-rtm-public">Edit</a>
                                                    <a href='' class="btn btn-danger border border-white" target="_blank">Delete</a>
                                                </td>
                                            </tr>
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
@endsection


@section('js')
@endsection
