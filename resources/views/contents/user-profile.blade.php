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
                <form class="needs-validation" novalidate method="post" action="{{ route('user.do-update-profile') }}">
                    {{ csrf_field() }}
                    <input value="{{$profile->id}}" name="id" type="hidden" class="form-control">
                    <div class="main-card card mb-4">
                        <div class="card-body"><h5 class="card-title">Kontak Pendaftar</h5>
                            <div class="text-center">
                                <div class="row justify-content-center">
                                    <div class="pr-0 col-6">
                                        <div class="mb-3 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="pe-7s-user"> </i></span>
                                            </div>
                                            <input value="{{$profile->nama_pendaftar}}" name="nama_pendaftar" type="text" class="form-control" placeholder="Nama Pendaftar" aria-describedby="validationTooltipUsernamePrepend" required>
                                            <div class="invalid-tooltip">
                                                Silahkan isi nama Pendaftar.
                                            </div>
                                        </div>
                                        <div class="mb-3 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="pe-7s-mail"> </i></span>
                                            </div>
                                            <input value="{{$profile->email_pendaftar}}" name="email_pendaftar" type="email" class="form-control" placeholder="Alamat email Pendaftar" aria-describedby="validationTooltipUsernamePrepend" required>
                                            <div class="invalid-tooltip">
                                                Silahkan isi alamat email Pendaftar.
                                            </div>
                                        </div>
                                        <div class="mb-0 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="pe-7s-study"> </i></span>
                                            </div>
                                            <input value="{{$profile->jabatan_pendaftar}}" name="jabatan_pendaftar" type="text" class="form-control" placeholder="Jabatan Pendaftar" aria-describedby="validationTooltipUsernamePrepend" required>
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
                                            <input value="{{$profile->nomor_telepon_pendaftar}}" name="nomor_telepon_pendaftar" type="number" class="form-control" placeholder="Nomor Telepon Pendaftar" aria-describedby="validationTooltipUsernamePrepend" required>
                                            <div class="invalid-tooltip">
                                                Silahkan isi nomor telepon Pendaftar.
                                            </div>
                                        </div>
                                        <div class="mb-0 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="pe-7s-lock"> </i></span>
                                            </div>
                                            <input value="{{$profile->password}}" name="password" type="password" class="form-control" placeholder="Password Pendaftar" aria-describedby="validationTooltipUsernamePrepend" required>
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
                                            <input value="{{$profile->nama_instansi_usaha}}" name="nama_instansi_usaha" type="text" class="form-control" placeholder="Nama Perusahaan/Instansi" aria-describedby="validationTooltipUsernamePrepend" required>
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
                                            <input value="{{$profile->kabupaten_kota}}" name="kabupaten_kota" type="text" class="form-control" placeholder="Kabupaten/Kota" aria-describedby="validationTooltipUsernamePrepend" required>
                                            <div class="invalid-tooltip">
                                                Silahkan isi Kabupaten/Kota Perusahaan/Instansi.
                                            </div>
                                        </div>
                                        <div class="mb-3 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="pe-7s-call"> </i></span>
                                            </div>
                                            <input value="{{$profile->nomor_telepon_instansi_usaha}}" name="nomor_telepon_instansi_usaha" type="number" class="form-control" placeholder="Nomor Telepon Perusahaan/Instansi" aria-describedby="validationTooltipUsernamePrepend" required>
                                            <div class="invalid-tooltip">
                                                Silahkan isi nomor telepon Perusahaan/Instansi.
                                            </div>
                                        </div>
                                        <div class="mb-3 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="pe-7s-mail"> </i></span>
                                            </div>
                                            <input value="{{$profile->kode_pos_instansi_usaha}}" name="kode_pos_instansi_usaha" type="number" class="form-control" placeholder="Kode Pos Perusahaan/Instansi" aria-describedby="validationTooltipUsernamePrepend" required>
                                            <div class="invalid-tooltip">
                                                Silahkan isi kode pos Perusahaan/Instansi.
                                            </div>
                                        </div>
                                        <div class="mb-0 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="pe-7s-culture"> </i></span>
                                            </div>
                                            <input value="{{$profile->jenis_instansi_usaha}}" name="jenis_instansi_usaha" type="text" class="form-control" placeholder="Jenis Perusahaan/Instansi" aria-describedby="validationTooltipUsernamePrepend" required>
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
                                            <input value="{{$profile->kecamatan}}" name="kecamatan" type="text" class="form-control" placeholder="Kecamatan" aria-describedby="validationTooltipUsernamePrepend" required>
                                            <div class="invalid-tooltip">
                                                Silahkan isi Kecamatan Perusahaan/Instansi.
                                            </div>
                                        </div>
                                        <div class="mb-3 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="pe-7s-print"> </i></span>
                                            </div>
                                            <input value="{{$profile->nomor_fax_instansi_usaha}}" name="nomor_fax_instansi_usaha" type="number" class="form-control" placeholder="Nomor Fax Perusahaan/Instansi" aria-describedby="validationTooltipUsernamePrepend" required>
                                            <div class="invalid-tooltip">
                                                Silahkan isi nomor fax Perusahaan/Instansi.
                                            </div>
                                        </div>
                                        <div class="mb-0 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="pe-7s-id"> </i></span>
                                            </div>
                                            <input value="{{$profile->kode_kbli}}" name="kode_kbli" type="number" class="form-control" placeholder="Kode KBLI" aria-describedby="validationTooltipUsernamePrepend" required>
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