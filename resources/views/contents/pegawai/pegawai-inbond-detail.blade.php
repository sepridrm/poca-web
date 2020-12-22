@extends('app')

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-menu icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Inbond Detail</div>
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-md-12 mx-auto">
                <input value="" name="id" type="hidden" class="form-control">
                <div class="main-card card mb-4">
                    <div class="card-body"><h5 class="card-title">Data Inbond Detail</h5>
                        <div class="table-responsive">
                            <table class="mb-0 table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Material</th>
                                    <th>Qty</th>
                                    <th>Type</th>
                                    <th>Serial Number</th>
                                    <th>Foto Material</th>
                                    <th>Keterangan</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $lastMaterial = '';
                                    @endphp
                                    @foreach ($data as $index => $data)
                                        <tr class="data-row">
                                            <td>
                                                {{ $index+1 }}
                                            </td>
                                            @if($data->id_material != $lastMaterial)
                                                <td>
                                                    {{ $data->nama_material }}
                                                </td>
                                                <td>
                                                    {{ $data->qty }}
                                                </td>
                                            @else
                                                <td></td>
                                                <td></td>
                                            @endif
                                            <td>
                                                {{ $data->type }}
                                            </td>
                                            <td>
                                                {{ $data->serial_number }}
                                            </td>
                                            <td>
                                                <img src="{{ url($data->path_foto) }}" width="50" height="50" onclick="window.location='{{ url($data->path_foto) }}'" style="cursor: pointer;" />
                                            </td>
                                            <td>
                                                {{ $data->keterangan }}
                                            </td>
                                        </tr>
                                        @php
                                            $lastMaterial = $data->id_material;
                                        @endphp
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