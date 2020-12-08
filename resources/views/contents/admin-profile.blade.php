@extends('app')

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-user icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Profile</div>
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-md-12 mx-auto">
                <form class="needs-validation" novalidate method="post" action="{{ route('admin.do-update-profile') }}">
                    {{ csrf_field() }}
                    <input value="{{$profile->id}}" name="id" type="hidden" class="form-control">
                    <div class="main-card card mb-4">
                        <div class="card-body"><h5 class="card-title">Data Admin</h5>
                            <div class="text-center">
                                <div class="row justify-content-center">
                                    <div class="pr-0 col-6">
                                        <div class="mb-3 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="pe-7s-user"> </i></span>
                                            </div>
                                            <input value="{{$profile->nama}}" name="nama" type="text" class="form-control" placeholder="Nama Admin" aria-describedby="validationTooltipUsernamePrepend" required>
                                            <div class="invalid-tooltip">
                                                Silahkan isi nama Admin.
                                            </div>
                                        </div>
                                        <div class="mb-3 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="pe-7s-mail"> </i></span>
                                            </div>
                                            <input value="{{$profile->email}}" name="email" type="email" class="form-control" placeholder="Alamat email Admin" aria-describedby="validationTooltipUsernamePrepend" required>
                                            <div class="invalid-tooltip">
                                                Silahkan isi alamat email Admin.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pr-3 col-6">
                                        <div class="mb-3 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="pe-7s-phone"> </i></span>
                                            </div>
                                            <input value="{{$profile->nama_role}}" name="nama_role" type="text" class="form-control" placeholder="Nama role Admin" aria-describedby="validationTooltipUsernamePrepend" required readonly>
                                            <div class="invalid-tooltip">
                                                Nama role Admin
                                            </div>
                                        </div>
                                        <div class="mb-0 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="pe-7s-lock"> </i></span>
                                            </div>
                                            <input value="{{$profile->password}}" name="password" type="password" class="form-control" placeholder="Password Admin" aria-describedby="validationTooltipUsernamePrepend" required>
                                            <div class="invalid-tooltip">
                                                Silahkan isi password Admin.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="main-card card mb-5">
                        <div class="card-body">
                            <button class="border-1 btn-transition btn btn-outline-success btn-block btn-lg" type="submit">Update</button>
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
@endsection