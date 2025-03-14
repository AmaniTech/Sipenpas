@extends('layouts.main')

@section('title')
    | Master Kategori
@endsection

@section('main')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Kategori</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Kategori</li>
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
                                data-bs-target="#addKategori">Tambah Data</button>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Kategori</th>
                                        <th>Jumlah Juri</th>
                                        <th>Tipe</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategori as $k)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $k->nama }}</td>
                                            <td>{{ $k->jml_juri }}</td>
                                            <td>
                                                <button href='' class="btn btn-warning border border-white"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#ekatgeori_{{ $k->id }}">Edit</button>
                                                <form action="/kategori/delete/{{ $k->id }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger border border-white"
                                                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</button>
                                                </form>
                                                <a href="{{ route('listpoin.print', $k->id) }}"
                                                    class="btn btn-info">Print</a>

                                            </td>
                                        </tr>

                                        <div class="modal fade" id="ekatgeori_{{ $k->id }}" tabindex="-1"
                                            aria-labelledby="ekatgeori_{{ $k->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="ekatgeori_{{ $k->id }}Label">Edit Data</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('kategori.update', $k->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-3">
                                                                <label for="nama" class="form-label">Nama</label>
                                                                <input type="text" class="form-control" id="nama"
                                                                    name="nama" value="{{ $k->nama }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nama" class="form-label">Jumlah Juri</label>
                                                                <input type="number" class="form-control" id="jml_juri"
                                                                    name="jml_juri" value="{{ $k->jml_juri }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nama" class="form-label">Tipe</label>
                                                                <select name="tipe" id="" class="form-select">
                                                                    <option value="peringkat"
                                                                        {{ $k->tipe == 'peringkat' ? 'selected' : '' }}>
                                                                        PERINGKAT</option>
                                                                    <option value="umum"
                                                                        {{ $k->tipe == 'umum' ? 'selected' : '' }}>UMUM
                                                                    </option>
                                                                </select>
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

    <div class="modal fade" id="addKategori" tabindex="-1" aria-labelledby="addKategoriLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addKategoriLabel">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kategori.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Jumlah Juri</label>
                            <input type="number" class="form-control" id="jml_juri" name="jml_juri">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Tipe</label>
                            <select name="tipe" id="" class="form-select">
                                <option value="">Pilih Tipe Kategori</option>
                                <option value="peringkat">PERINGKAT
                                </option>
                                <option value="umum">UMUM</option>
                            </select>
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
