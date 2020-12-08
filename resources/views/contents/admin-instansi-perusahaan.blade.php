@extends('app')

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-culture icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Perusahaan/Instansi</div>
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-md-12 mx-auto">
                <input value="" name="id" type="hidden" class="form-control">
                <div class="main-card card mb-4">
                    <div class="card-body"><h5 class="card-title">Data Perusahaan/Instansi</h5>
                        <div class="row justify-content-center">
                            <div class="table-responsive" style="width: 97%">
                                <table id="table_id" class="mb-0 table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th hidden>Id</th>
                                        <th>#</th>
                                        <th>Nama Perusahaan/Instansi</th>
                                        <th>Alamat</th>
                                        <th>Nomor Telepon</th>
                                        <th>Nomor Fax</th>
                                        <th>Kode KBLI</th>
                                        <th>Jenis Usaha</th>
                                        <th>Nama Pendaftar</th>
                                        <th>Jabatan Pendaftar</th>
                                        <th>Email Pendaftar</th>
                                        <th>Nomor Telpon Pendaftar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($instansiPerusahaan as $index => $data)
                                            <tr class="data-row">
                                                <td hidden>
                                                    {{ $data->id }}
                                                </td>
                                                {{-- <td>
                                                    <button class="border-0 btn-transition btn btn-outline-info">Detail</button>
                                                </td> --}}
                                                <td>
                                                    {{ ($index+1) }}
                                                </td>
                                                <td>
                                                    {{ $data->nama_instansi_usaha }}
                                                </td>
                                                <td>
                                                    {{ $data->kabupaten_kota }}, {{ $data->kecamatan }} {{ $data->kode_pos_instansi_usaha }}
                                                </td>
                                                <td>
                                                    {{ $data->nomor_telepon_instansi_usaha }}
                                                </td>
                                                <td>
                                                    {{ $data->nomor_fax_instansi_usaha }}
                                                </td>
                                                <td>
                                                    {{ $data->kode_kbli }}
                                                </td>
                                                <td>
                                                    {{ $data->jenis_instansi_usaha }}
                                                </td>
                                                <td>
                                                    {{ $data->nama_pendaftar }}
                                                </td>
                                                <td>
                                                    {{ $data->jabatan_pendaftar }}
                                                </td>
                                                <td>
                                                    {{ $data->email_pendaftar }}
                                                </td>
                                                <td>
                                                    {{ $data->nomor_telepon_pendaftar }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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

@section('js')
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable({
                dom: 'B<"clear">lfrtip',
                buttons: true,
                responsive: true
            });
        } );
    </script>
@endsection