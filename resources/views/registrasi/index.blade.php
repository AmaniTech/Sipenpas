<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi Peserta Baris</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
        integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI=" crossorigin="anonymous" />
    <link rel="stylesheet" href="/dist/css/adminlte.css" />
    <link rel="stylesheet" href="/icon/phospor/src/regular/style.css" />
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center mt-5">
            <div class="w-100 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Formulir Pendaftaran Grup</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('registrasi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mx-auto">
                                @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @elseif(session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Data Grup</h4>
                                    <div class="form-group mb-3
                                ">
                                        <label for="nama">Asal Sekolah</label>
                                        <input type="text" name="asal_sekolah" id="nama" class="form-control">
                                    </div>
                                    <div class="form-group mb-3
                                ">
                                        <label for="nama">Tingkatan</label>
                                        <input type="text" name="tingkatan" id="nama" class="form-control">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="tim">Tim</label>
                                        <input type="text" name="tim" id="tim" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="nohp">No Hp</label>
                                        <input type="text" name="no_hp" id="no_hp" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="bukti_pembayaran">Bukti Pembayaran</label>
                                        <input type="file" name="bukti_pembayaran" id="bukti_pembayaran"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6" style="border-left: 1px solid #dddddd;">
                                    <h4>Data Anggota</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="peserta">Nama Official</label>
                                                <input type="text" name="peserta[]" id="peserta"
                                                    class="form-control">
                                            </div>
                                            <div
                                                class="form-group mb-3
                                                ">
                                                <label for="peserta">Nama Pelatih</label>
                                                <input type="text" name="peserta[]" id="peserta"
                                                    class="form-control">
                                            </div>
                                            <div
                                                class="form-group mb-3
                                                ">
                                                <label for="peserta">Nama Danton</label>
                                                <input type="text" name="peserta[]" id="peserta"
                                                    class="form-control">
                                            </div>
                                            <div
                                                class="form-group mb-3
                                                ">
                                                <label for="peserta">Nama Anggota 1</label>
                                                <input type="text" name="peserta[]" id="peserta"
                                                    class="form-control">
                                            </div>
                                            <div
                                                class="form-group mb-3
                                                ">
                                                <label for="peserta">Nama Anggota 2</label>
                                                <input type="text" name="peserta[]" id="peserta"
                                                    class="form-control">
                                            </div>
                                            <div
                                                class="form-group mb-3
                                                ">
                                                <label for="peserta">Nama Anggota 3</label>
                                                <input type="text" name="peserta[]" id="peserta"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group mb-3
                                            ">
                                                <label for="peserta">Nama Anggota 4</label>
                                                <input type="text" name="peserta[]" id="peserta"
                                                    class="form-control">
                                            </div>
                                            <div
                                                class="form-group mb-3
                                                ">
                                                <label for="peserta">Nama Anggota 5</label>
                                                <input type="text" name="peserta[]" id="peserta"
                                                    class="form-control">
                                            </div>
                                            <div
                                                class="form-group mb-3
                                                ">
                                                <label for="peserta">Nama Anggota 6</label>
                                                <input type="text" name="peserta[]" id="peserta"
                                                    class="form-control">
                                            </div>
                                            <div
                                                class="form-group mb-3
                                                ">
                                                <label for="peserta">Nama Anggota 7</label>
                                                <input type="text" name="peserta[]" id="peserta"
                                                    class="form-control">
                                            </div>

                                            <div
                                                class="form-group mb-3
                                                ">
                                                <label for="peserta">Nama Anggota 8</label>
                                                <input type="text" name="peserta[]" id="peserta"
                                                    class="form-control">
                                            </div>

                                            <div
                                                class="form-group mb-3
                                                ">
                                                <label for="peserta">Nama Anggota 9</label>
                                                <input type="text" name="peserta[]" id="peserta"
                                                    class="form-control">
                                            </div>
                                            <div
                                                class="form-group mb-3
                                                ">
                                                <label for="peserta">Nama Anggota 10</label>
                                                <input type="text" name="peserta[]" id="peserta"
                                                    class="form-control">
                                            </div>
                                            <div
                                                class="form-group mb-3
                                                ">
                                                <label for="peserta">Nama Anggota 11</label>
                                                <input type="text" name="peserta[]" id="peserta"
                                                    class="form-control">
                                            </div>
                                            <div
                                                class="form-group mb-3
                                                ">
                                                <label for="peserta">Nama Anggota 12</label>
                                                <input type="text" name="peserta[]" id="peserta"
                                                    class="form-control">
                                            </div>
                                            <div
                                                class="form-group mb-3
                                                ">
                                                <label for="peserta">Nama Anggota 13</label>
                                                <input type="text" name="peserta[]" id="peserta"
                                                    class="form-control">
                                            </div>
                                            <div
                                                class="form-group mb-3
                                                ">
                                                <label for="peserta">Nama Anggota 14</label>
                                                <input type="text" name="peserta[]" id="peserta"
                                                    class="form-control">
                                            </div>

                                            <div
                                                class="form-group mb-3
                                                ">
                                                <label for="peserta">Nama Anggota 15</label>
                                                <input type="text" name="peserta[]" id="peserta"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="foto_peserta">Foto Official</label>
                                                <input type="file" name="foto_peserta[]" id="foto_peserta"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group mb-3
                                            ">
                                                <label for="foto_peserta">Foto Pelatih</label>
                                                <input type="file" name="foto_peserta[]" id="foto_peserta"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group mb-3
                                            ">
                                                <label for="foto_peserta">Foto Danton</label>
                                                <input type="file" name="foto_peserta[]" id="foto_peserta"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group mb-3
                                            ">
                                                <label for="foto_peserta">Foto Anggota 1</label>
                                                <input type="file" name="foto_peserta[]" id="foto_peserta"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group mb-3
                                            ">
                                                <label for="foto_peserta">Foto Anggota 2</label>
                                                <input type="file" name="foto_peserta[]" id="foto_peserta"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group mb-3
                                            ">
                                                <label for="foto_peserta">Foto Anggota 3</label>
                                                <input type="file" name="foto_peserta[]" id="foto_peserta"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group mb-3
                                            ">
                                                <label for="foto_peserta">Foto Anggota 4</label>
                                                <input type="file" name="foto_peserta[]" id="foto_peserta"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group mb-3
                                            ">
                                                <label for="foto_peserta">Foto Anggota 5</label>
                                                <input type="file" name="foto_peserta[]" id="foto_peserta"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group mb-3
                                            ">
                                                <label for="foto_peserta">Foto Anggota 6</label>
                                                <input type="file" name="foto_peserta[]" id="foto_peserta"
                                                    class="form-control">
                                            </div>
                                            <div
                                                class="form-group mb-3
                                                ">
                                                <label for="foto_peserta">Foto Anggota 7</label>
                                                <input type="file" name="foto_peserta[]" id="foto_peserta"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group mb-3
                                            ">
                                                <label for="foto_peserta">Foto Anggota 8</label>
                                                <input type="file" name="foto_peserta[]" id="foto_peserta"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group mb-3
                                            ">
                                                <label for="foto_peserta">Foto Anggota 9</label>
                                                <input type="file" name="foto_peserta[]" id="foto_peserta"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group mb-3
                                            ">
                                                <label for="foto_peserta">Foto Anggota 10</label>
                                                <input type="file" name="foto_peserta[]" id="foto_peserta"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group mb-3
                                            ">
                                                <label for="foto_peserta">Foto Anggota 11</label>
                                                <input type="file" name="foto_peserta[]" id="foto_peserta"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group mb-3
                                            ">
                                                <label for="foto_peserta">Foto Anggota 12</label>
                                                <input type="file" name="foto_peserta[]" id="foto_peserta"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group mb-3
                                            ">
                                                <label for="foto_peserta">Foto Anggota 13</label>
                                                <input type="file" name="foto_peserta[]" id="foto_peserta"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group mb-3
                                            ">
                                                <label for="foto_peserta">Foto Anggota 14</label>
                                                <input type="file" name="foto_peserta[]" id="foto_peserta"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group mb-3
                                            ">
                                                <label for="foto_peserta">Foto Anggota 15</label>
                                                <input type="file" name="foto_peserta[]" id="foto_peserta"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-md d-flex ms-auto mt-3">Daftar &nbsp; <i
                                    class="ph ph-clipboard-text my-auto"></i></button>
                        </form>
                    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
    integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ=" crossorigin="anonymous"></script>
<!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>
<!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
<script src="/dist/js/adminlte.js"></script>

</html>
