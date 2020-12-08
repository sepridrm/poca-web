@extends('app')

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-menu icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Laporan {{$title}}</div>
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-md-12 mx-auto">
                @if($visible)
                    <form class="needs-validation" novalidate method="post" action="{{ route('user.do-tempo') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input value="{{$title}}" name="jenis_laporan" type="hidden" class="form-control">
                        <input value="{{$loginSession['user_id']}}" name="id" type="hidden" class="form-control">
                        <div class="main-card card mb-4">
                            <div class="card-body"><h5 class="card-title">Waktu Laporan</h5>
                                <div class="row">
                                    <div class="pr-3 col-5 mb-4">
                                        <label>Set Waktu Laporan</label>
                                        <div class="input-group"> 
                                            <select name="tempo" class="form-control">
                                                <option value="">Pilih waktu laporan</option>
                                                <option value="1">Per 1 bulan</option>
                                                <option value="3">Per 3 bulan</option>
                                                <option value="6">Per 6 bulan</option>
                                                <option value="12">Per 12 bulan</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="pr-3 col-7 mb-4">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" aria-label="Close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                                            Waktu laporan digunakan untuk menjadwalkan laporan yang harus diinput yakni per 1, 3, 6, atau 12 bulan.
                                        </div>
                                    </div>

                                    <div class="pr-3 col-12">
                                        <button class="border-1 btn-transition btn btn-outline-success btn-block btn-lg" type="submit">Kirim</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" aria-label="Close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                        Anda memilih waktu laporan per {{$tempo->tempo}} bulan.
                    </div>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" aria-label="Close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                        Anda telah mengunggah {{$jumlahLaporan}} laporan dan belum mengunggah {{$countLapor}} laporan lagi untuk tahun ini.
                    </div>
                @endif

                <form class="needs-validation" novalidate method="post" action="{{ route('user.do-laporan') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input value="{{$title}}" name="jenis_laporan" type="hidden" class="form-control">
                    <input value="{{$loginSession['user_id']}}" name="id" type="hidden" class="form-control">
                    <div class="main-card card mb-4">
                        <div class="card-body"><h5 class="card-title">Input Laporan</h5>
                            <div class="row">
                                <div class="pr-3 col-6 mb-4">
                                    <label for="">Berkas Laporan</label>
                                    <input type="file" name="path_file[]" class="form-control" autocomplete="off" accept="application/pdf, .doc, .docx, .xls, .xlsx" multiple>
                                </div>

                                <div class="pr-3 col-12">
                                    @if($countLapor <= 0)
                                        <button disabled class="border-1 btn-transition btn btn-outline-success btn-block btn-lg" type="submit">Kirim</button>
                                    @else
                                        <button class="border-1 btn-transition btn btn-outline-success btn-block btn-lg" type="submit">Kirim</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="main-card card mb-4">
                    <div class="card-body"><h5 class="card-title">Data Laporan</h5>
                        <div class="table-responsive">
                            <table id="table_id" class="mb-0 table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th hidden></th>
                                    <th>#</th>
                                    <th>Tanggal laporan</th>
                                    <th>Berkas laporan</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $data)
                                    <tr class="data-row">
                                        <td hidden>
                                            {{ $data->id }}
                                        </td>
                                        <td>
                                            {{ ($index+1) }}
                                        </td>
                                        <td>
                                            {{ $data->created_at }}
                                        </td>
                                        <td>
                                            @php
                                                $path_file = json_decode($data->path_file, true);
                                            @endphp
                                            @foreach ($path_file as $key=>$item)
                                                <a href="{{ url($item) }}">file{{($key+1)}}/ </a>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
            });
        } );
    </script>

    {{-- <script>
        $( document ).ready(function(){
            console.log('document');
        });

        $( window ).on( "load", function(){
            console.log('window');
        });
    </script>

    <script>
        (["dari","sampai"])
            .forEach(e=>{
                const startDate = $(`input[name="start_date"]`).val().split("-")
                const endDate = $(`input[name="end_date"]`).val().split("-")

                $(`.input-date[name="${e}"]`).datepicker({
                    startDate: new Date(startDate[0] , startDate[1] - 1 , startDate[2]),
                    endDate: new Date(endDate[0], endDate[1] - 1, endDate[2]),
                    trigger: `.btn-pick-date-${e}`,
                    format:"yyyy-mm-dd",
                })
            });

            $(".input-date").on("pick.datepicker",e=>{
                $(e.target).parent().find(".btn-pick-date").hide()
                $(e.target).parent().find(".btn-danger").show()
            })

            function onResetDate(ev) {
                const inputDate = $(ev).closest(".input-group").find(".input-date")
                
                inputDate.datepicker("reset")
                inputDate.val("")

                $(ev).prev().show()
                $(ev).hide()
            }
    </script> --}}
@endsection