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
</head>

<body>
    <div class="container-fluid mt-5">
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
                                            {{ $i }}@if ($i < $lp->max_poin)
                                                |
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
</body>

</html>
