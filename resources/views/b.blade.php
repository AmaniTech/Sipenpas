<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian</title>
    <style>
        /* Flexbox container untuk tabel per kategori */
        .flex-container {
            display: flex;
            flex-wrap: wrap; /* Membuat tabel pindah ke bawah ketika mentok */
            gap: 10px; /* Jarak antar tabel */
        }

        /* Styling untuk tabel */
        table {
            border-collapse: collapse;
            min-width: 300px; /* Lebar minimal tabel */
            flex: 1 1 auto; /* Tabel akan tumbuh dan menyusut sesuai ruang */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 5px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            margin-bottom: 10px;
        }

        .tim-info {
            margin-bottom: 10px;
            padding: 15px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }

        .tim-info h3 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="tim-info">
        <table>
            <tr>
                <th>Nama Sekolah</th>
                <th>:</th>
                <td>{{ $tim->asal_sekolah }}</td>
            </tr>
            <tr>
                <th>Tim</th>
                <th>:</th>
                <td>{{ $tim->tim }}</td>
            </tr>
            <tr>
                <th>Tingkatan</th>
                <th>:</th>
                <td>{{ $tim->tingkatan }}</td>
            </tr>
        </table>

    </div>

    <div class="flex-container">
        @foreach($groupedData as $kategori => $subKategoriData)
            <div style="font-size: 12px">
                <h4>{{ $kategori }}</h4>
                <table style="border: 1px solid black">
                    <thead>
                        <tr>
                            <th>Penilaian</th>
                            @for($i = 1; $i <= count($subKategoriData[array_key_first($subKategoriData)]); $i++)
                                <th>Juri {{ $i }}</th>
                            @endfor
                            <th>Total</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalKategori = 0; 
                        @endphp
                        @foreach($subKategoriData as $subKategori => $items)
                            @php
                                $totalSubKategori = 0; 
                            @endphp
                            <tr>
                                <td>{{ $subKategori }}</td>
                                @foreach($items as $item)
                                    <td>{{ $item->plus }}</td>
                                    @php
                                        $totalSubKategori += $item->plus; 
                                    @endphp
                                @endforeach
                                <td>{{ $totalSubKategori }}</td> 
                            </tr>
                            @php
                                $totalKategori += $totalSubKategori; 
                            @endphp
                        @endforeach
                        <tr class="total-row">
                            <td colspan="{{ count($subKategoriData[array_key_first($subKategoriData)]) + 1 }}"><b>Total Poin</b></td>
                            <td>{{ $totalKategori }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endforeach
            <div style="font-size: 12px">
                <h4>MINUS</h4>
                <table>
                    <thead>
                        <tr>
                            <th style="background-color: red; color: white">No</th>
                            <th style="background-color: red; color: white">Nama</th>
                            <th style="background-color: red; color: white">Poin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($minus as $it)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $it->nama }}</td>
                                <td>{{ $it->poin }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            

    </div>

    <br>

    <div class="flex-container">
        {{-- PERINGKAT --}}
        <div style="font-size: 12px">
            <h3>PERINGKAT</h3>
            <table border="1" cellpadding="5" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Kategori</th>
                        <th>Total Poin</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalPeringkat = 0;
                    @endphp
                    @foreach ($totalan as $item)
                        @if ($item->tipe === 'PERINGKAT')
                            <tr>
                                <td>{{ $item->kategori_nama }}</td>
                                <td>{{ $item->total_poin }}</td>
                            </tr>
                            @php
                                $totalPeringkat += $item->total_poin;
                            @endphp
                        @endif
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Total</th>
                        <th>{{ $totalPeringkat }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>

        {{-- UMUM --}}
        <div style="font-size: 12px">
            <h3>UMUM</h3>
            <table border="1" cellpadding="5" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Kategori</th>
                        <th>Total Poin</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalUmum = 0;
                    @endphp
                    @foreach ($totalan as $item)
                        @if ($item->tipe === 'UMUM')
                            <tr>
                                <td>{{ $item->kategori_nama }}</td>
                                <td>{{ $item->total_poin }}</td>
                            </tr>
                            @php
                                $totalUmum += $item->total_poin;
                            @endphp
                        @endif
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Total</th>
                        <th>{{ $totalUmum }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>
</html>