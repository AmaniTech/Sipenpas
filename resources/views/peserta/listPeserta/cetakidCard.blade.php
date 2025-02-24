<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card {{ $data_grup->asal_sekolah }}-{{ $data_grup->tim }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .id-card {
            width: 9.5cm;
            height: 11.9cm;
            border: 1px solid #000;
            padding: 10px;
            margin: 5px;
            display: inline-block;
            box-sizing: border-box;
            text-align: center;
            background-image: url('https://cdn.pixabay.com/photo/2020/02/24/18/05/background-4876988_640.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .id-card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
            border: 2px solid white;
        }

        .id-card h5 {
            margin: 5px 0;
            font-size: 18px;
        }

        .id-card p {
            margin: 2px 0;
            font-size: 12px;
        }

        @media print {
            .id-card {
                page-break-inside: avoid;
            }


            body {
                -webkit-print-color-adjust: exact;
            }

            @page {
                size: auto;
                margin: 0;
            }

        }

        .id-card h5 {
            font-size: 24px;
            font-weight: bold;
            margin: 10px 0;
            color: #fff;
            /* Warna teks putih */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            /* Shadow teks */
        }

        /* Gaya untuk teks informasi */
        .id-card p {
            font-size: 13px;
            margin: 1px 0;
            color: #fff;
            /* Warna teks putih */
        }

        /* Gaya untuk teks khusus (seperti tahun) */
        .id-card .special-text {
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
            color: #fff;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            @foreach ($peserta as $p)
                <div class="col-2 id-card mt-3">
                    @if ($p->posisi == 'Official')
                        <h5>{{ $p->posisi }}</h5>
                    @elseif($p->posisi == 'Pelatih')
                        <h5>{{ $p->posisi }}</h5>
                    @else
                        <h5>PESERTA</h5>
                    @endif
                    
                    <img src="/storage/peserta_foto/{{ $p->foto }}" alt="Foto Profil">

                    <h4>{{ $p->nama }}</h4>
                    <p>Event Imlek</p>
                    <p>{{ $data_grup->asal_sekolah }}</p>
                    <p>{{ $data_grup->tim }}</p>
                    <p class="special-text">PASURUAN {{ date('Y') }}</p>
                </div>
            @endforeach

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
