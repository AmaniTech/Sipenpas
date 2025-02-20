<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$data_grup->asal_sekolah}} | {{$data_grup->tim}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin-left: 12px;
        }

        th,
        td {
            padding: 5px;
        }

        p {
            margin-bottom: 0px;
        }

        .anu {
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px;
        }

        .small-font {
            font-size: 9px;
        }

        .custom-table {
            border: 0px;
        }

        .lightbox-gallery{
            background-image: linear-gradient(#4A148C, #E53935);
            background-repeat: no-repeat;
            color: #000;
            overflow-x: hidden}
            
        .lightbox-gallery p{color:#fff}
        .lightbox-gallery h2{font-weight:bold;margin-bottom:40px;padding-top:40px;color:#fff}

        @media (max-width:767px){
            .lightbox-gallery h2{margin-bottom:25px;padding-top:25px;font-size:24px}
        }

        .lightbox-gallery 
        .intro{font-size:16px;max-width:500px;margin:0 auto 40px}
        .lightbox-gallery .intro p{margin-bottom:0}
        .lightbox-gallery .photos{padding-bottom:20px}
        .lightbox-gallery .item{padding-bottom:30px}
        
    </style>
  </head>
    <body class="">
        <div>
            <table class="table p-5 mx-auto" style="border-bottom: 2px solid black">
                <thead class="">
                    <tr>
                        {{-- <th class="anu mx-auto text-center " style="width: 70px">
                            <img src="/logo.png" alt="fti" style="padding: 20px" height="150px">
                        </th> --}}
                        {{-- <th class="text-center">
                            <h2 class="fw-bold">PENGURUS POKJA MEKARPUTIH</h2>
                            <h4 class="fw-bold">PASKIBRAKA KABUPATEN GARUT</h4>
                            <p>Sekretariat: Jl. Cijayana No. 01 Mekarmukni Garut 44165</p>
                            <p>Website: www.fti.unmerpas.ac.idEmail: fti@unmerpas.ac.id</p>
                        </th> --}}
                        <th class="text-center">
                            <h2 class="fw-bold">FORMULIR PENDAFTARAN</h2>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    <div class="">
        <div>
            <table class="table p-5 mx-auto" style="border-bottom: 2px solid white">
                <thead>
                    <tr>
                        {{-- <th class="text-center">
                            <h6 class="fw-bold">Formulir Pendaftaran</h6>
                            <h6 class="fw-bold">PESERTA LKBB BERAKSI MKM</h6>
                        </th> --}}
                    </tr>
                </thead>
            </table>
        </div>
        <div>
            <div class="row">
                <div class="col">
                    <table>
                        <tr>
                            <th>ASAL SEKOLAH</th>
                            <th>:</th>
                            <td>{{$data_grup->asal_sekolah}}</td>
                        </tr>
                        <tr>
                            <th>TIM</th>
                            <th>:</th>
                            <td>{{$data_grup->tim}}</td>
                        </tr>
                        <tr>
                            <th>NO. HP</th>
                            <th>:</th>
                            <td>{{$data_grup->no_hp}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <br>

        <div class="row">
            @foreach ($danton as $p)
                <div class="col" style="display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center;">
                    <div style="display: flex; justify-content: center; align-items: center;">
                        <img class="img" src="/storage/peserta_foto/{{$p->foto}}" style="width: 3cm; height: 4cm;">
                    </div>
                    <div style="margin-top: 10px;">
                        <span>{{$p->nama}}</span>
                    </div>
                </div>

            @endforeach
        </div>
        <br>
        <div class="row photos" border="1">
            @foreach ($peserta as $p)
                {{-- <div class="col-2 item">
                    <div class="row text-center">
                        <img class="img" src="/storage/peserta_foto/{{$p->foto}}" style="width: 3cm; height: 4cm;">
                    </div>
                    <div class="row text-center">
                        <span>{{$p->nama}}</span>
                    </div>
                </div> --}}
                <div class="col-2 item">
                    <div class="row justify-content-center text-center">
                        <img class="img" src="/storage/peserta_foto/{{$p->foto}}" style="width: 3cm; height: 4cm;">
                    </div>
                    <div class="row justify-content-center text-center">
                        <span>{{$p->nama}}</span>
                    </div>
                </div>

            @endforeach
        </div>
        <br><br>

        <div>
            <table class="table table-bordered p-5 mx-auto" style="border: 1px solid white">
                <thead>
                    <tr>
                        <th>
                            <table>
                                <tr>
                                    <th></th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td></td>
                                </tr>
                            </table>
                        </th>
                        <th class="float-end">
                            <table>
                                <tr>
                                    <div class="row">
                                        <span style="font-size: 15px">PENANGGUNG JAWAB</span>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="row">
                                        <div class="row">
                                            <span></span>
                                            <span style="color: white">wad</span>
                                        </div>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="row">
                                        <div class="row">
                                            <span></span>
                                            <span style="color: white">wad</span>
                                        </div>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="row">
                                        <div class="row">
                                            <span></span>
                                            <span style="color: white">wad</span>
                                        </div>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="row">
                                        <div class="row">
                                            <span></span>
                                            <span>(........................................)</span>
                                        </div>
                                    </div>
                                </tr>
                            </table>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>

        <br><br>
        <br><br>
        <br><br>
    </div>
    </body>
</html>