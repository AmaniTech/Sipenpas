@extends('layouts.main')

@section('title')
    | Rekap
@endsection

@section('main')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Rekap</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Rekap</li>
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
                                        <th scope="col">Grup</th>
                                        @foreach ($kategori as $k )
                                        <th scope="col">{{$k->nama}}</th>
                                        @endforeach
                                        <th>Minus</th>
                                        <th scope="col">Total Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d )
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$d->grup->asal_sekolah}} - {{$d->grup->tim}}</td>
                                        @foreach ($kategori as $k )
                                        <td>{{ $d->items->where('kategori_id', $k->id)->sum('plus') }}</td>
                                        @endforeach
                                        <td>{{$d->penilaianadministrasi->sum('poin')}}</td>
                                        <td>{{$d->poin}}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
            </div>
        @endsection


        @section('js')
        @endsection
