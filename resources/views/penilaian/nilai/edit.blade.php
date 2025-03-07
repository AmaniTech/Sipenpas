@extends('layouts.main')

@section('title')
| ({{$data_sekolah->asal_sekolah}} - {{$data_sekolah->tim}})
@endsection

@section('main')
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6"><h3 class="mb-0">Update Penilaian ({{$data_sekolah->asal_sekolah}} - {{$data_sekolah->tim}})</h3></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="/penilaian">Penilaian <b>(*Update)</b></a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$data_sekolah->asal_sekolah}} - {{$data_sekolah->tim}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Data Penilaian</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-1">
                                    <button class="btn btn-info btn-rounded" onclick="simpanYangKuy(this)" title="Update">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <a class="btn btn-danger btn-rounded" href="/penilaian">
                                        Back
                                    </a>
                                </div>
                                <div class="col" id="loading" style="display: none;">
                                    <strong>Loading...</strong>
                                    <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
                                </div>

                                <div class="col">
                                    <button class="btn btn-warning btn-rounded float-end" title="Diskuliafikasi" onclick="diskualifikasi(this)">
                                        DISKUALIFIKASI
                                    </button>
                                </div>
                            </div>
                            <br>
                            <form id="formPenilaian">
                            <div class="row">
                                <div class="col-md-4">
                                    <table width="100%">
                                        <tr>
                                            <td>Sekolah</td>
                                            <td>:</td>
                                            <td style="border: 0px none;">
                                               <input type="text" style="width:70%; border: 0 none; border-bottom: 1px solid black;" value="{{$data_sekolah->asal_sekolah}}" readonly>
                                               <input type="hidden" name="grup_id" value="{{$data_sekolah->id}}" id="grup_id">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tingkatan</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" style="width:70%; border: 0 none; border-bottom: 1px solid black;" value="{{$data_sekolah->tingkatan}}" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tim</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" style="width:70%; border: 0 none; border-bottom: 1px solid black;" value="{{$data_sekolah->tim}}" readonly>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table width="100%">
                                        <tr>
                                            <td width="50%">Jumlah Peserta</td>
                                            <td width="10%" align="right">:</td>
                                            <td width="40%" style="border: 0px none;">
                                                <input type="text" style="width:100%; border: 0 none; border-bottom: 1px solid black;" value="{{$data_sekolah->peserta->count()}}" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Nama Pelatih</td>
                                            <td width="10%" align="right">:</td>
                                            <td width="40%" style="border: 0px none;">
                                                <input type="text" style="width:100%; border: 0 none; border-bottom: 1px solid black;" value="{{$data_sekolah->peserta->where('posisi', 'Pelatih')->first()->nama}}" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Danton</td>
                                            <td width="10%" align="right">:</td>
                                            <td width="40%" style="border: 0px none;">
                                                <input type="text" style="width:100%; border: 0 none; border-bottom: 1px solid black;" value="{{$data_sekolah->peserta->where('posisi', 'Danton')->first()->nama}}" readonly>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table style="width: 100%;">
                                        <tr>
                                            <td width="50%">Tanggal Penilaian</td>
                                            <td width="10%" align="right">:</td>
                                            <td width="40%" style="border: 0px none;">
                                                <input type="date" name="tgl" id="tgl" style="width:100%; border: 0 none; border-bottom: 1px solid black;" value="{{date('Y-m-d')}}" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Total Nilai</td>
                                            <td width="10%" align="right">:</td>
                                            <td width="40%" style="border: 0px none;">
                                                <input style="width:100%; border: 0 none; border-bottom: 1px solid black;" value="{{$totalnilai}}" readonly>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-wrap">
                                <div class="col-md-4">
                                    <table class="table table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th>Penilaian</th>
                                                <th>Juri</th>
                                                <th colspan="3">Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $header = 'hmmm';
                                            @endphp
                                            @foreach ($data as $d)
                                                @if ($d->kategoriname !== $header)
                                                    @php
                                                        $header = $d->kategoriname;
                                                    @endphp
                                                    <tr>
                                                        <th colspan="6" align="left" style="background-color: #D3D3D3;">{{$d->kategoriname}}</th>
                                                    </tr>
                                                    <tr>
                                                        <input type="hidden" name="idnya[]" value="{{$d->id}}">
                                                        <td>{{$d->sub_kategoriname}}</td>
                                                        <td>{{$d->juri}}</td>
                                                        <td>
                                                            <input type="number" class="text-center" name="poin_plus[{{$d->id}}]" value="{{$d->plus}}" style="border: 0 none; background-color: #FCF3CF;">
                                                        </td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <input type="hidden" name="idnya[]" value="{{$d->id}}">
                                                        <td>{{$d->sub_kategoriname}}</td>
                                                        <td>{{$d->juri}}</td>
                                                        <td>
                                                            <input type="number" class="text-center" name="poin_plus[{{$d->id}}]" value="{{$d->plus}}" style="border: 0 none; background-color: #FCF3CF;">
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="col-md-4">
                                    <table class="table table-bordered text-center">
                                        <thead>
                                            <tr colspan="3">
                                                <th colspan="3" class="text-center bg-danger" style="color: white">Skor Minus</th>
                                            </tr>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Tipe</th>
                                                <th>Poin</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dataMinus as $o)
                                                <tr>
                                                    <input type="hidden" name="id_administrasi[]" value="{{$o->id}}">
                                                    <td>{{$o->nama}}</td>
                                                    <td>{{$o->tipe}}</td>
                                                    <td>
                                                        <input type="number" class="text-center" name="poin_min[{{$o->id}}]" value="{{$o->poin}}" style="border: 0 none; background-color: #FCF3CF;">
                                                    </td>
                                                </tr>
                                            @endforeach                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </form>
            </div>
        </div>

@endsection


@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.min.css" rel="stylesheet">

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function openModal(){
        $('#loading').css('display', 'block');
    }
    function closeModal(){
        $('#loading').css('display', 'none');
    }

    function simpanYangKuy(a) {
        $.ajax({
            url: "/b/penilaian",
            dataType: 'json',
            data: $("#formPenilaian").serialize(),
            type: 'PUT',
            beforeSend: function() {
                openModal();
            },
            complete: function() {
                closeModal();
            },
            success: function(data) {
                console.log(data);
                if (data.status == 200) {
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil!",
                        text: "Data Berhasil Tersimpan!",
                        showCancelButton: false,
                        showConfirmButton: true
                    }).then(function() {
                        location.reload();
                    });

                }else{
                    Swal.fire({
                        icon: "error",
                        title: "Gagal!",
                        text: "Terjadi Kesalahan!",
                        showCancelButton: false,
                        showConfirmButton: true
                    });
                }
            }
        });
    }

    function diskualifikasi(params) {
        const data = $('#grup_id').val();

        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Peserta ini akan di didiskualifikasi!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, Lanjutkan!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/didis",
                    dataType: 'json',
                    data: {data},
                    type: 'POST',
                    beforeSend: function() {
                        openModal();
                    },
                    complete: function() {
                        closeModal();
                    },
                    success: function(data) {
                        console.log(data);
                        if (data.status == 200) {
                            Swal.fire({
                                icon: "success",
                                title: "Berhasil!",
                                text: "Data Berhasil Tersimpan!",
                                showCancelButton: false,
                                showConfirmButton: true
                            }).then(function() {
                                window.location.href = "/penilaian";
                            });

                        }else{
                            Swal.fire({
                                icon: "error",
                                title: "Gagal!",
                                text: "Terjadi Kesalahan!",
                                showCancelButton: false,
                                showConfirmButton: true
                            });
                        }
                    }
                });
            }
        });

        
    }
</script>
@endsection
