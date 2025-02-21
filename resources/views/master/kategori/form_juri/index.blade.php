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
                <p class="underline-title">{{DB::table('setting')->where('id', 1)->value('nama_lomba')}}  {{date('Y')}}</p>
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
                        <th style="background-color: yellow !important">{{ $data->nama }}</th>
                        @foreach ($data->subkategori->first()->listpoin as $lp)
                            <th style="background-color: yellow !important">{{ $lp->level }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data->subkategori as $sk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sk->nama }}</td>
                            @foreach ($sk->listpoin->sortBy('urutan') as $lp)
                                <td class="text-center">
                                    <table>
                                        <tr>
                                            @for ($i = $lp->min_poin; $i <= $lp->max_poin; $i++)
                                                {{ $i }}
                                                @if ($i < $lp->max_poin)
                                                    ,
                                                @endif
                                            @endfor
                                        </tr>
                                    </table>

                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Bagian CATATAN -->
        <div class="mt-4">
            <table class="table table-bordered">
                <tr>
                    <th class="text-center">CATATAN</th>
                </tr>
                <tr>
                    <td style="height: 150px;"></td>
                </tr>
            </table>
        </div>

        <!-- Bagian Tanda Tangan -->
        <div class="signature-section">
            <div class="row">
                <div class="col-4 text-start">Mengetahui dan menyetujui:</div>
                <div class="col-4 text-center">TTD Juri</div>
                <div class="col-4 text-end"><em>PASURUAN {{date('Y')}}</em></div>
            </div>
            <div class="row signature-line">
                <div class="col-12 text-center">(...................................)</div>
            </div>
        </div>
    </div>
</body>

</html>
