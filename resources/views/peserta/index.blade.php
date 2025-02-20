@extends('layouts.main')

@section('title')
| Data Peserta
@endsection

@section('main')
        <div class="app-content-header">
            <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"><h3 class="mb-0">Data Peserta</h3></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Peserta</li>
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
                                {{-- <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addKategori">Tambah Data</button> --}}

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Grup</th>
                                            <th scope="col">HP</th>
                                            <th scope="col">Bukti Pembayaran</th>
                                            <th scope="col">Tanggal Registrasi</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($grup as $g)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$g->asal_sekolah}} - {{$g->tim}}</td>
                                                <td>{{$g->no_hp}}</td>
                                                <td>
                                                    <a href="/storage/bukti_pembayaran/{{$g->bukti_pembayaran}}">
                                                        <img src="/storage/bukti_pembayaran/{{$g->bukti_pembayaran}}" alt="gambar" width="70px">
                                                    </a>
                                                </td>
                                                <td>{{$g->created_at->format('d-m-Y')}}</td>
                                                <td>
                                                    <a href="/list/peserta/{{$g->id}}">
                                                        <button class="btn btn-primary">
                                                            <i class="bi bi-list-ul"></i> Anggota
                                                        </button>
                                                    </a>

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
