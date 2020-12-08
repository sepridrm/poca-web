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
        <div class="row align-items-center h-100">
            <div class="col-md-8 mx-auto">
                <form class="needs-validation" novalidate method="post" action="{{ route('do-login') }}">
                    {{ csrf_field() }}
                    <div class="text-center">
                        <img class="mb-3" width="120" src="assets/assets/images/icon.png" alt="">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="widget-numbers text-white"><h5>Strategi Implementasi Pengawasan dan</h5></div>
                                <div class="widget-numbers text-white"><h5>Pengendalian Lingkungan Hidup</h5></div>
                                <div class="mb-4 widget-numbers text-white"><h5>Sumatera Selatan</h5></div>

                                {{-- <div class="mb-4 row justify-content-center">
                                    <div class="pr-0 col-4">
                                        <hr style="border: 1px solid; border-radius: 1px; border-color: rgb(224,224,224)">
                                    </div>
                                    <div class="pr-0 pl-0 col-4" style="display: flex; align-items: center; justify-content: center">
                                        <div class="widget-numbers text-white"><h5>SIPP-LINK</h5></div>
                                    </div>
                                    <div class="pl-0 col-4">
                                        <hr style="border: 1px solid; border-radius: 1px; border-color: rgb(224,224,224)">
                                    </div>
                                </div> --}}

                                <div class="mb-3 input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="pe-7s-mail"> </i></span>
                                    </div>
                                    <input name="email" type="text" class="form-control" placeholder="Alamat email" aria-describedby="validationTooltipUsernamePrepend" required>
                                    <div class="invalid-tooltip">
                                        Silahkan isi alamat email.
                                    </div>
                                </div>

                                <div class="mb-4 input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="pe-7s-lock"> </i></span>
                                    </div>
                                    <input name="password" type="password" class="form-control" placeholder="Kata sandi" aria-describedby="validationTooltipUsernamePrepend" required>
                                    <div class="invalid-tooltip">
                                        Silahkan isi kata sandi.
                                    </div>
                                </div>

                                <div class="mb-2 row justify-content-center">
                                    <div class="pr-0 col-6">
                                        <button class="border-1 btn-transition btn btn-outline-primary btn-block btn-lg" type="submit">Masuk</button>
                                    </div>
                                    <div class="pr-3 col-6">
                                        <a href="{{ route('signup') }}"  class="border-1 btn-transition btn btn-outline-success btn-block btn-lg" type="submit">Daftar</a>
                                    </div>
                                </div>

                                <p class="mb-0 text-white">Jika lupa kata sandi ?</p>
                                <a href="#" class="mb-4 btn btn-link">Klik disini</a>

                                <p class="mb-0 text-muted">2020 | Dinas Lingkungan Hidup dan Pertanahan</p>
                                <p class="mb-0 text-muted">Provinsi Sumatera Selatan</p>
                            </div>
                        </div>
                    </div>
                </form>
                @if($message = Session::get('message'))
                <div class="row justify-content-center">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="position: fixed; bottom: 10px; margin-left: 10px; margin-right: 10px">
                        <button type="button" class="close" aria-label="Close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                        {{$message}}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('assets/assets/scripts/main.js')}}"></script>
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
</body>
</html>