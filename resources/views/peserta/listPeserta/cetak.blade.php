<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin-left: 12px
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
    <body>
        <div>
            <table class="table p-5 mx-auto" style="border-bottom: 2px solid black">
                <thead class="">
                    <tr>
                        <th class="anu mx-auto text-center " style="width: 70px">
                            <img src="/logo.png" alt="fti" style="padding: 20px" height="150px">
                        </th>
                        <th class="text-center">
                            <h2 class="fw-bold">PENGURUS POKJA MEKARPUTIH</h2>
                            <h4 class="fw-bold">PASKIBRAKA KABUPATEN GARUT</h4>
                            <p>Sekretariat: Jl. Cijayana No. 01 Mekarmukni Garut 44165</p>
                            <p>Website: www.fti.unmerpas.ac.idEmail: fti@unmerpas.ac.id</p>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
        <div>
            <table class="table p-5 mx-auto" style="border-bottom: 2px solid white">
                <thead>
                    <tr>
                        <th class="text-center">
                            <h6 class="fw-bold">Formulir Pendaftaran</h6>
                            <h6 class="fw-bold">PESERTA LKBB BERAKSI MKM</h6>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
        <div>
            <div class="row">
                <div class="col">
                    <table>
                        <tr>
                            <th>No / Nama Pasukan</th>
                            <td>011 / MACAN PUTIH</td>
                        </tr>
                        <tr>
                            <th>ASAL SATUAN</th>
                            <td>SMK MEKARMUKTI</td>
                        </tr>
                        <tr>
                            <th>PEMBINA/PELATIH</th>
                            <td>WAHYU HERMANSYAH</td>
                        </tr>
                        <tr>
                            <th>NO. HP</th>
                            <td>081210488129</td>
                        </tr>
                    </table>
                </div>
                <div class="col item text-center">
                    <div class="row">
                        <img class="img" src="/storage/peserta_foto/{{$danton->foto}}" width="50px" height="180px">
                    </div>
                    <div class="row">
                        <span>{{$danton->nama}}</span>
                    </div>
                    <div class="row">
                        <span>Komandan Danton</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row photos" border="1">
            @foreach ($peserta as $p)
                <div class="col-2 item text-center">
                    <div class="row">
                        <img class="img" src="/storage/peserta_foto/{{$p->foto}}" width="50px" height="180px">
                    </div>
                    <div class="row">
                        <span>{{$p->nama}}</span>
                    </div>
                    <div class="row">
                        <span>{{$p->posisi}}</span>
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
                        <th class="text-center">
                            <table>
                                <tr>
                                    <div class="row">
                                        <div class="row">
                                            <span>Mengetahui,</span>
                                            <span>Kepala Sekolah</span>
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
                                            <span>(.............................)</span>
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
    </body>
</html>