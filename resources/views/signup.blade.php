<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>SIPP-LINK</title>
    <link rel="icon" href="{{asset('assets/assets/images/icon.png')}}" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="{{asset('assets/main.css')}}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid bg-tempting-azure">
        <div class="app-header">
            <a href="{{ route('login') }}" type="button" class="ml-2 hamburger hamburger--elastic">
                <span class="hamburger-box">
                    <i class="fa fa-arrow-left fa-lg"> </i>
                </span>
            </a>
        </div>

        <div class="row align-items-center h-200">
            <div class="col-md-10 mx-auto">
                <div class="alert alert-warning">Silahkan melakukan registrasi secara online bagi perusahaan yang akan melakukan proses pelaporan elektronik Lingkungan Hidup</div>
                <form class="needs-validation" novalidate method="post" action="{{ route('do-signup') }}">
                    {{ csrf_field() }}
                    <div class="main-card card mb-4">
                        <div class="card-body"><h5 class="card-title">Kontak Pendaftar</h5>
                            <div class="text-center">
                                <div class="row justify-content-center">
                                    <div class="pr-0 col-6">
                                        <div class="mb-3 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="pe-7s-user"> </i></span>
                                            </div>
                                            <input name="nama_pendaftar" type="text" class="form-control" placeholder="Nama Pendaftar" aria-describedby="validationTooltipUsernamePrepend" required>
                                            <div class="invalid-tooltip">
                                                Silahkan isi nama Pendaftar.
                                            </div>
                                        </div>
                                        <div class="mb-3 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="pe-7s-mail"> </i></span>
                                            </div>
                                            <input name="email_pendaftar" type="email" class="form-control" placeholder="Alamat email Pendaftar" aria-describedby="validationTooltipUsernamePrepend" required>
                                            <div class="invalid-tooltip">
                                                Silahkan isi alamat email Pendaftar.
                                            </div>
                                        </div>
                                        <div class="mb-0 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="pe-7s-study"> </i></span>
                                            </div>
                                            <input name="jabatan_pendaftar" type="text" class="form-control" placeholder="Jabatan Pendaftar" aria-describedby="validationTooltipUsernamePrepend" required>
                                            <div class="invalid-tooltip">
                                                Silahkan isi jabatan Pendaftar.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pr-3 col-6">
                                        <div class="mb-3 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="pe-7s-phone"> </i></span>
                                            </div>
                                            <input name="nomor_telepon_pendaftar" type="number" class="form-control" placeholder="Nomor Telepon Pendaftar" aria-describedby="validationTooltipUsernamePrepend" required>
                                            <div class="invalid-tooltip">
                                                Silahkan isi nomor telepon Pendaftar.
                                            </div>
                                        </div>
                                        <div class="mb-0 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="pe-7s-lock"> </i></span>
                                            </div>
                                            <input name="password" type="password" class="form-control" placeholder="Password Pendaftar" aria-describedby="validationTooltipUsernamePrepend" required>
                                            <div class="invalid-tooltip">
                                                Silahkan isi password Pendaftar.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="main-card card mb-4">
                        <div class="card-body"><h5 class="card-title">Data Perusahaan/Instansi</h5>
                            <div class="text-center">
                                <div class="row justify-content-center">
                                    <div class="pr-3 col-12">
                                        <div class="mb-3 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="pe-7s-culture"> </i></span>
                                            </div>
                                            <input name="nama_instansi_usaha" type="text" class="form-control" placeholder="Nama Perusahaan/Instansi" aria-describedby="validationTooltipUsernamePrepend" required>
                                            <div class="invalid-tooltip">
                                                Silahkan isi nama Perusahaan/Instansi.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pr-0 col-6">
                                        <div class="mb-3 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="pe-7s-map-2"> </i></span>
                                            </div>
                                            <input name="kabupaten_kota" type="text" class="form-control" placeholder="Kabupaten/Kota" aria-describedby="validationTooltipUsernamePrepend" required>
                                            <div class="invalid-tooltip">
                                                Silahkan isi Kabupaten/Kota Perusahaan/Instansi.
                                            </div>
                                        </div>
                                        <div class="mb-3 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="pe-7s-call"> </i></span>
                                            </div>
                                            <input name="nomor_telepon_instansi_usaha" type="number" class="form-control" placeholder="Nomor Telepon Perusahaan/Instansi" aria-describedby="validationTooltipUsernamePrepend" required>
                                            <div class="invalid-tooltip">
                                                Silahkan isi nomor telepon Perusahaan/Instansi.
                                            </div>
                                        </div>
                                        <div class="mb-3 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="pe-7s-mail"> </i></span>
                                            </div>
                                            <input name="kode_pos_instansi_usaha" type="number" class="form-control" placeholder="Kode Pos Perusahaan/Instansi" aria-describedby="validationTooltipUsernamePrepend" required>
                                            <div class="invalid-tooltip">
                                                Silahkan isi kode pos Perusahaan/Instansi.
                                            </div>
                                        </div>
                                        <div class="mb-0 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="pe-7s-culture"> </i></span>
                                            </div>
                                            <input name="jenis_instansi_usaha" type="text" class="form-control" placeholder="Jenis Perusahaan/Instansi" aria-describedby="validationTooltipUsernamePrepend" required>
                                            <div class="invalid-tooltip">
                                                Silahkan jenis Perusahaan/Instansi.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pr-3 col-6">
                                        <div class="mb-3 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="pe-7s-map-2"> </i></span>
                                            </div>
                                            <input name="kecamatan" type="text" class="form-control" placeholder="Kecamatan" aria-describedby="validationTooltipUsernamePrepend" required>
                                            <div class="invalid-tooltip">
                                                Silahkan isi Kecamatan Perusahaan/Instansi.
                                            </div>
                                        </div>
                                        <div class="mb-3 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="pe-7s-print"> </i></span>
                                            </div>
                                            <input name="nomor_fax_instansi_usaha" type="number" class="form-control" placeholder="Nomor Fax Perusahaan/Instansi" aria-describedby="validationTooltipUsernamePrepend" required>
                                            <div class="invalid-tooltip">
                                                Silahkan isi nomor fax Perusahaan/Instansi.
                                            </div>
                                        </div>
                                        <div class="mb-0 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="pe-7s-id"> </i></span>
                                            </div>
                                            <input name="kode_kbli" type="number" class="form-control" placeholder="Kode KBLI" aria-describedby="validationTooltipUsernamePrepend" required>
                                            <div class="invalid-tooltip">
                                                Silahkan isi kode KBLI.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="main-card card mb-5">
                        <div class="card-body">
                            <button class="border-1 btn-transition btn btn-outline-success btn-block btn-lg" type="submit">Daftar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <script type="text/javascript" src="{{asset('assets/assets/scripts/main.js')}}"></script>
    
</body>
</html>