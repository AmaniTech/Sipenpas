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
            {{-- {{dd($item)}} --}}
            @foreach ($item->groupBy('kategori.id') as $kategoriId => $kategoriItems)
                <div class="col-md-4">
                    <div class="p-4 border rounded-lg shadow-md mb-4">
                        <h3 class="font-semibold text-lg">{{ $kategoriItems->first()->kategori->nama }}</h3>
                        <ul class="mt-2">
                            @foreach ($kategoriItems->groupBy('subkategori.id') as $subkategoriId => $subkategoriItems)
                                <li>{{ $subkategoriItems->first()->subkategori->nama }} =
                                    {{ $subkategoriItems->pluck('plus')->join(', ') }}
                                </li>
                            @endforeach
                        </ul>
                        <hr class="my-2">
                        <strong>Total Nilai: {{ $kategoriItems->sum('plus') }}</strong>
                    </div>
                </div>
            @endforeach

            <h1>
                Minus
            </h1>

            <div class="p-4 border rounded-lg shadow-md mb-4">
                @foreach ($minus->groupBy('administrasi.id') as $administrasiId => $administrasiItems)
                    {{-- {{dd($administrasiItems)}} --}}


                    @foreach ($administrasiItems as $subkategoriId => $subkategoriItems)
                        <li>{{ $subkategoriItems->administrasi->nama }} =
                            {{ $subkategoriItems->poin }}
                        </li>
                    @endforeach
                @endforeach
                <hr class="my-2">

                <strong>Total Nilai: {{ $minus->sum('poin') }}</strong>
            </div>


        </div>
    </div>
</body>

</html>
