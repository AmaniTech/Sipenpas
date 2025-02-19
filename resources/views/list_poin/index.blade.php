@extends('layouts.main')

@section('title')
    | Poin {{ $subkategori->nama }}
@endsection

@section('main')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">List Poin {{ $subkategori->nama }}</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Set Poin</li>
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
                            <h3 class="card-title">List Poin Sub Kategori Kerapihan</h3>
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
                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                data-bs-target="#addListpoin">Tambah Data</button>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Level</th>
                                        <th scope="col">Min Poin</th>
                                        <th scope="col">Max Poin</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listpoin as $lp)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $lp->level }}</td>
                                            <td>{{ $lp->min_poin }}</td>
                                            <td>{{ $lp->max_poin }}</td>
                                            <td>
                                                <button href='' class="btn btn-warning border border-white"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#elistpoin_{{ $lp->id }}">Edit</button>
                                                <form action="/listpoin/delete/{{ $lp->id }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger border border-white"
                                                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</button>
                                                </form>

                                            </td>
                                        </tr>

                                        <div class="modal fade" id="elistpoin_{{ $lp->id }}" tabindex="-1"
                                            aria-labelledby="elistpoin_{{ $lp->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="elistpoin_{{ $lp->id }}Label">Edit Data</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('listpoin.update', $lp->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="sub_kategori_id"
                                                                value="{{ $lp->sub_kategori_id }}">

                                                            <div class="mb-3">
                                                                <label for="nama" class="form-label">Level</label>
                                                                <select class="form-select" name="level" id="">
                                                                    <option value="5"
                                                                        @if ($lp->level == '5') selected @endif>A
                                                                    </option>
                                                                    <option value="4"
                                                                        @if ($lp->level == '4') selected @endif>B
                                                                    </option>
                                                                    <option value="3"
                                                                        @if ($lp->level == '3') selected @endif>C
                                                                    </option>
                                                                    <option value="2"
                                                                        @if ($lp->level == '2') selected @endif>K
                                                                    </option>
                                                                    <option value="1"
                                                                        @if ($lp->level == '1') selected @endif>SK
                                                                    </option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="min_poin" class="form-label">Min
                                                                    Poin</label>
                                                                <input type="number" class="form-control"
                                                                    id="min_poin" name="min_poin"
                                                                    value="{{ $lp->min_poin }}">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="max_poin" class="form-label">Max
                                                                    Poin</label>
                                                                <input type="number" class="form-control"
                                                                    id="max_poin" name="max_poin"
                                                                    value="{{ $lp->max_poin }}">
                                                            </div>

                                                            <div class="mb-3">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        role="switch" name="is_minus"
                                                                        id="flexSwitchCheckDefault"
                                                                        @if ($lp->is_minus == 1) checked @endif>
                                                                    <label class="form-check-label"
                                                                        for="flexSwitchCheckDefault"> Minus</label>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
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

    <div class="modal fade" id="addListpoin" tabindex="-1" aria-labelledby="addListpoinLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addListpoinLabel">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('listpoin.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="sub_kategori_id" value="{{ $subkategori->id }}">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Level</label>
                            <select class="form-select" name="level" id="">
                                <option value="">Pilih Level</option>
                                <option value="5">A</option>
                                <option value="4">B</option>
                                <option value="3">C</option>
                                <option value="2">K</option>
                                <option value="1">SK</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="min_poin" class="form-label">Min Poin</label>
                            <input type="number" class="form-control" id="min_poin" name="min_poin">
                        </div>
                        <div class="mb-3">
                            <label for="max_poin" class="form-label">Max Poin</label>
                            <input type="number" class="form-control" id="max_poin" name="max_poin">
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" name="is_minus"
                                    id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault"> Minus</label>
                            </div>
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
