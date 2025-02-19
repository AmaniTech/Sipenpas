@extends('layouts.main')

@section('title')
| {{$data_grup->asal_sekolah}} - {{$data_grup->tim}}
@endsection


@section('main')
        <div class="app-content-header">
            <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"><h3 class="mb-0">Data Peserta {{$data_grup->asal_sekolah}} - {{$data_grup->tim}}</h3></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="/peserta">Data Peserta</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$data_grup->asal_sekolah}} - {{$data_grup->tim}}</li>
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
                                <a href="">
                                    <button type="button" class="btn btn-primary mb-3"><i class="bi bi-printer"></i> Cetak Data</button>
                                </a>
                                <table class="table table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Posisi</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($peserta as $g)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$g->nama}} </td>
                                                <td>{{$g->posisi}}</td>
                                                <td>
                                                    <a href="/storage/peserta_foto/{{$g->foto}}">
                                                        <img src="/storage/peserta_foto/{{$g->foto}}" alt="gambar" width="70px">
                                                    </a>
                                                </td>
                                                <td>
                                                    <button href='' class="btn btn-warning border border-white" data-bs-toggle="modal" data-bs-target="#epeserta_{{$g->id}}">Edit</button>
                                                    <form action="/d/juri/{{$g->id}}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger border border-white">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="epeserta_{{$g->id}}" tabindex="-1" aria-labelledby="epeserta_{{$g->id}}Label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="epeserta_{{$g->id}}Label">Edit Data</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                    <div class="modal-body">
                                                        <form action="/update/peserta/{{$g->id}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="sekolah" value="{{$g->grup_id}}">
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Nama Peserta</label>
                                                                <input type="text" class="form-control" name="name" value="{{$g->nama}}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Posisi</label>
                                                                <input type="text" class="form-control" name="posisi" value="{{$g->posisi}}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Gambar</label>
                                                                <input class="dropify" type="file" name="photo" id="file" style="width: 100%"/>
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
@endsection


@section('js')

<script>
    let table = new DataTable('#table1');

    // function update(){
    //     let files = $('#file')[0].files;
    //     var data = new FormData();
    //     data.append('file', files[0]);
    //     data.append('file', files[0]);
    //     $.ajax({
    //         url: "/testing/upload",
    //         method: 'POST',
    //         data: data,
    //         contentType: false,
    //         processData: false,
    //         dataType: 'json',
    //         success: function(response) {
    //             Swal.fire({
    //                 icon: 'success',
    //                 title: 'Tersimpan!',
    //                 text: 'Gambar Berhasil di-upload!!'
    //             }).then((result) => {
    //                 if (result.isConfirmed) {
    //                     window.location.reload()
    //                 }
    //             });
    //         },
    //         error: function(xhr) {
    //             Swal.fire({
    //                 icon: 'error',
    //                 title: 'Oops...',
    //                 text: xhr,
    //             })
    //             return;
    //         }
    //     });
    // }
</script>
@endsection
