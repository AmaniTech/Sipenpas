@extends('layouts.main')

@section('title')
| Master Kategori
@endsection

@section('main')
        <div class="app-content-header">
            <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"><h3 class="mb-0">Data Administrasi & Juri Arena</h3></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Administrasi & Juri Arena</li>
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
                                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addAdministrasi">Tambah Data</button>
                                <a href="{{route('administrasi.print')}}" class="btn btn-info mb-3"><i class="bi bi-printer"></i> Print Form</a>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Jenis</th>
                                            <th scope="col">Nama Aturan</th>
                                            <th scope="col">Nilai</th>
                                            <th scope="col">Tipe</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($administrasi as $a)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$a->jenis}}</td>
                                                <td>{{$a->nama}}</td>
                                                <td>{{$a->nilai}}</td>
                                                <td>{{$a->tipe == 'diskualifikasi' ? 'diskualifikasi' : '/ ' . $a->tipe}}</td>
                                                <td>
                                                    <button href='' class="btn btn-warning border border-white" data-bs-toggle="modal" data-bs-target="#eadministrasi{{$a->id}}">Edit</button>
                                                    <form action="/administrasi/delete/{{$a->id}}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger border border-white" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="eadministrasi{{$a->id}}" tabindex="-1" aria-labelledby="eadministrasi{{$a->id}}Label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="eadministrasi{{$a->id}}Label">Edit Data</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('administrasi.update', $a->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-3">
                                                                <label for="nama" class="form-label">Nama</label>
                                                                <input type="text" class="form-control" id="nama" name="nama" value="{{$a->nama}}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nama" class="form-label">Jenis</label>
                                                                <select name="jenis" id="" class="form-select">
                                                                    <option value="Administrasi" {{$a->jenis == 'Administrasi' ? 'selected' : ''}}>Administrasi</option>
                                                                    <option value="Juri Arena Lomba" {{$a->jenis == 'Juri Arena Lomba' ? 'selected' : ''}}>Juri Arena Lomba</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nama" class="form-label">Tipe</label>
                                                                <select name="tipe" id="" class="form-select">
                                                                    <option value="diskualifikasi" {{$a->tipe == 'diskualifikasi' ? 'selected' : ''}}>Diskualifikasi</option>
                                                                    <option value="anggota" {{$a->tipe == 'anggota' ? 'selected' : ''}}>anggota</option>
                                                                    <option value="aba - aba" {{$a->tipe == 'aba - aba' ? 'selected' : ''}}>aba - aba</option>
                                                                    <option value="tim" {{$a->tipe == 'tim' ? 'selected' : ''}}>tim</option>
                                                                    <option value="detik" {{$a->tipe == 'detik' ? 'selected' : ''}}>detik</option>
                                                                    <option value="trash bag" {{$a->tipe == 'trash bag' ? 'selected' : ''}}">trash bag</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nama" class="form-label">Nilai</label>
                                                                <input type="number" class="form-control" id="nama" name="nilai" value="{{$a->nilai}}">
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

        <div class="modal fade" id="addAdministrasi" tabindex="-1" aria-labelledby="addAdministrasiLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addAdministrasiLabel">Tambah Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                <div class="modal-body">
                    <form action="{{route('administrasi.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Jenis</label>
                            <select name="jenis" id="" class="form-select">
                                <option value="Administrasi">Administrasi</option>
                                <option value="Juri Arena Lomba">Juri Arena Lomba</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Tipe</label>
                            <select name="tipe" id="" class="form-select">
                                <option value="diskualifikasi">Diskualifikasi</option>
                                <option value="anggota">anggota</option>
                                <option value="aba - aba">aba - aba</option>
                                <option value="tim">tim</option>
                                <option value="detik">detik</option>
                                <option value="trash bag">trash bag</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nilai</label>
                            <input type="number" class="form-control" id="nama" name="nilai">
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
