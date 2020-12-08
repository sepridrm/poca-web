@extends('app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.9/datepicker.min.css">
@endsection

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-menu icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Izin {{$title}}</div>
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-md-12 mx-auto">
                @if(!$izinBerlaku)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" aria-label="Close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                        Perizinan Anda sudah melewati tanggal berlaku. Silahkan unggah perizinan yang baru.
                    </div>
                @else
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" aria-label="Close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                        {{$dateDiff}} lagi perizinan Anda akan habis masa berlaku.
                    </div>
                @endif
                <form class="needs-validation" novalidate method="post" action="{{ route('user.do-perizinan') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input value="{{$title}}" name="jenis_izin" type="hidden" class="form-control">
                    <input value="{{$loginSession['user_id']}}" name="id" type="hidden" class="form-control">
                    <input type="hidden" name="end_date" value="{{ $endDate }}">
                    <div class="main-card card mb-4">
                        <div class="card-body"><h5 class="card-title">Input Perizinan</h5>
                            <div class="row">
                                <div class="col-6 mb-4">
                                    <label for="">Berkas Perizinan</label>
                                    <input type="file" name="path_file[]" class="form-control mb-4" autocomplete="off" accept="application/pdf, .jpg" multiple>

                                    <label>Berlaku Sampai Tanggal</label> 
                                    <div class="input-group"> 
                                        <input type="text" name="sampai" readonly placeholder="Tekan icon kalender..." class="form-control input-date">
                                        <div class="input-group-append"> 
                                            <button type="button" class="btn btn-primary btn-pick-date btn-pick-date-sampai">
                                                <i class="fas fa-calendar    "></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" onclick="onResetDate(this)" style="display: none;">
                                                <i class="fas fa-times    "></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="pr-3 col-6 mb-4">
                                    <label>Status Perizinan</label>
                                    <div class="input-group"> 
                                        <select name="status" class="form-control">
                                            <option value="">Pilih status</option>
                                            <option value="Baru">Baru</option>
                                            <option value="Perpanjangan">Perpanjangan</option>
                                          </select>
                                    </div>
                                </div>

                                @if(!$izinBerlaku)
                                    <div class="pr-3 col-12">
                                        <button class="border-1 btn-transition btn btn-outline-success btn-block btn-lg" type="submit">Kirim</button>
                                    </div>
                                @else
                                    <div class="pr-3 col-12">
                                        <button class="border-1 btn-transition btn btn-outline-success btn-block btn-lg" type="submit" disabled>Kirim</button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>

                <div class="main-card card mb-4">
                    <div class="card-body"><h5 class="card-title">Data Perizinan</h5>
                        <div class="table-responsive">
                            <table id="table_id" class="mb-0 table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th hidden></th>
                                    <th>#</th>
                                    <th>Tanggal berlaku</th>
                                    <th>Berkas perizinan</th>
                                    <th>Status perizinan</th>
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
                                                {{ $data->tanggal_berlaku }}
                                            </td>
                                            <td>
                                                @php
                                                    $path_file = json_decode($data->path_file, true);
                                                @endphp
                                                @foreach ($path_file as $key=>$item)
                                                    <a href="{{ url($item) }}">file{{($key+1)}}/ </a>
                                                @endforeach
                                            </td>
                                            <td>
                                                {{ $data->status }}
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.9/datepicker.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment-with-locales.min.js"></script>

    <script>
        (["sampai"])
            .forEach(e=>{
                const endDate = $(`input[name="end_date"]`).val().split("-")

                $(`.input-date[name="${e}"]`).datepicker({
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
    </script>

    <script>
        $(document).ready( function () {
            $('#table_id').DataTable({
                dom: 'B<"clear">lfrtip',
                buttons: true,
            });
        } );
    </script>
@endsection