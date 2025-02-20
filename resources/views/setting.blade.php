@extends('layouts.main')

@section('title')
    | Welcome
@endsection

@section('main')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Setting</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Setting</li>
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
                            <h3 class="card-title">Setting</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"
                                    title="Collapse">
                                    <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                    <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-lte-toggle="card-remove" title="Remove">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('setting.update', $data->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="" class="form-label">
                                                Nama Lomba
                                            </label>
                                            <input type="text" class="form-control" name="nama_lomba"
                                                value="{{ $data->nama_lomba }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">
                                                Tanggal Mulai
                                            </label>
                                            <input type="date" class="form-control" name="tanggal_mulai"
                                                value="{{ $data->tanggal_mulai }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">
                                                Lokasi
                                            </label>
                                            <input type="text" class="form-control" name="lokasi"
                                                value="{{ $data->lokasi }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">
                                                Deskripsi
                                            </label>
                                            <input type="text" class="form-control" name="deskripsi"
                                                value="{{ $data->deskripsi }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">
                                                Logo
                                            </label>
                                            <input type="file" class="form-control" name="logo">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection


        @section('js')
        @endsection
