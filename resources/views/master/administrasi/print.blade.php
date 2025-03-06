<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="/dist/css/adminlte.css" />


    <style>
        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }

            @page {
                size: auto;
                margin: 0;
            }
        }

        table {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 0px;
        }
    </style>
    <style>
        .header-title {
            font-weight: bold;
        }

        .underline-title {
            font-weight: bold;
        }

        .form-box {
            width: 100px;
            height: 30px;
            border: 1px solid black;
        }

        .table-bordered {
            border: 2px solid black;
        }

        .signature-section {
            margin-top: 50px;
            text-align: center;
        }

        .signature-line {
            margin-top: 40px;
        }
    </style>


</head>

<body>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col text-start">
                <p class="header-title">FORMULIR PENILAIAN JURI</p>
                <p class="underline-title">{{ DB::table('setting')->where('id', 1)->value('nama_lomba') }}
                    {{ date('Y') }}</p>
            </div>
            <div class="col-auto fw-bold">JURI :</div>
            <div class="col-auto">
                <div class="form-box"></div>
            </div>
            <div class="col-auto fw-bold">NO. URUT</div>
            <div class="col-auto">
                <div class="form-box"></div>
            </div>
        </div>

        <div class="row">
            <table class="table table-sm table-bordered text-center" style="width: 100%">
                <thead>
                    <tr>
                        <th width="1%" style="background-color: yellow !important">No</th>
                        <th style="background-color: yellow !important">Administrasi</th>
                        <th style="background-color: yellow !important">Nilai</th>
                        <th style="background-color: yellow !important">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($administrasi as $a)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $a->nama }}
                                {{ $a->tipe == 'diskualifikasi' ? '(diskualifikasi)' : '(' . $a->nilai . ' poin/ ' . $a->tipe . ')' }}
                            </td>
                            <td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row mt-5">
            <table class="table table-sm table-bordered text-center" style="width: 100%">
                <thead>
                    <tr>
                        <th width="1%" style="background-color: yellow !important">No</th>
                        <th style="background-color: yellow !important">Juri Arena Lomba</th>
                        <th style="background-color: yellow !important">Nilai</th>
                        <th style="background-color: yellow !important">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($juri as $j)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $j->nama }}
                                {{ $j->tipe == 'diskualifikasi' ? '(diskualifikasi)' : '('. $j->nilai . ' poin/ ' . $j->tipe.')' }}
                            </td>
                            <td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Bagian CATATAN -->

        <!-- Bagian Tanda Tangan -->
        <div class="signature-section">
            <div class="row">
                <div class="col-4 text-start">Mengetahui dan menyetujui:</div>
                <div class="col-4 text-center">TTD Juri</div>
                <div class="col-4 text-end"><em>PASURUAN {{ date('Y') }}</em></div>
            </div>
            <div class="row signature-line">
                <div class="col-12 text-center">(...................................)</div>
            </div>
        </div>
    </div>
</body>

</html>
