@extends('app')

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-menu icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Inbond Material</div>
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-md-12 mx-auto">
                <input value="" name="id" type="hidden" class="form-control">
                <div class="main-card card mb-4">
                    <div class="card-body"><h5 class="card-title">Data Inbond Material</h5>
                        <div class="table-responsive">
                            <table class="mb-0 table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th></th>
                                    <th>DU ID</th>
                                    <th>DU Name</th>
                                    <th>Region, Sub Region</th>
                                    <th>Customer (Operator)</th>
                                    <th>Pegawai</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $data)
                                        <tr class="data-row">
                                            <td>
                                                {{ $index+1 }}
                                            </td>
                                            <td>
                                                <a href="{{ 'inbond-detail/'.$data->id }}" class="border-0 btn-transition btn btn-outline-info">Detail</button>
                                            </td>
                                            <td>
                                                {{ $data->du_id }}
                                            </td>
                                            <td>
                                                {{ $data->du_name }}
                                            </td>
                                            <td>
                                                {{ $data->nama_region }}, {{ $data->nama_sub_region }}
                                            </td>
                                            <td>
                                                {{ $data->nama_customer }} ({{ $data->nama_operator }})
                                            </td>
                                            <td>
                                                {{ $data->nama }}
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