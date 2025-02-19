@extends('layouts.main')

@section('title')
    | {{ $title }}
@endsection

@section('main')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Master Kategori</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Unfixed Layout</li>
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
                            <h3 class="card-title">DataTable with default features</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="#" class="btn btn-primary mb-3">Tambah Kategori</a>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="dtable" class="table table-bordered table-striped dataTable dtr-inline"
                                        aria-describedby="example1_info" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kategori as $k)
                                                <tr>
                                                    <td>{{ $k->id }}</td>
                                                    <td>{{ $k->nama }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                                        <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <link
        href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.2.2/b-3.2.2/b-html5-3.2.2/b-print-3.2.2/fh-4.0.1/r-3.0.4/sl-3.0.0/datatables.min.css"
        rel="stylesheet" integrity="sha384-ALEGtUM2RGOMZQUXW46geyqx+49GMUdw0DvHaD8n4B/X7yGhNXus1M7htdhBZpSo"
        crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"
        integrity="sha384-VFQrHzqBh5qiJIU0uGU5CIW3+OWpdGGJM9LBnGbuIH2mkICcFZ7lPd/AAtI7SNf7" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"
        integrity="sha384-/RlQG9uf0M2vcTw3CX7fbqgbj/h8wKxw7C3zu9/GxcBPRKOEcESxaxufwRXqzq6n" crossorigin="anonymous">
    </script>
    <script
        src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.2.2/b-3.2.2/b-html5-3.2.2/b-print-3.2.2/fh-4.0.1/r-3.0.4/sl-3.0.0/datatables.min.js"
        integrity="sha384-XngczsT9HJ0r6iE4yziDtn/ZW+T4/5mFe3FdITztw+8oJ9nBKTGvEPfjOL7n6rXZ" crossorigin="anonymous">
    </script>
    <script>
        const urlAjax = '{{ route('kategori.data') }}';
        $(document).ready(function($) {
            $('#dtable').DataTable({});
        });
    </script>
@endsection
