@extends('app')

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-home icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Dashboard</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-midnight-bloom">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Inbond Material</div>
                            <div class="widget-subheading"></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{{$countInbond}}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-arielle-smile">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Detail Inbond Material</div>
                            <div class="widget-subheading">Total Qty : {{$countInbondDetailQty}} pcs</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{{$countInbondDetail}}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-grow-early">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Qty Material</div>
                            <div class="widget-subheading"></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{{$countInbondSubDetail}} pcs</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-midnight-bloom">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Laporan PPA</div>
                            <div class="widget-subheading">Pengendalian Pencemaran Air</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>56</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-arielle-smile">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Laporan PPU</div>
                            <div class="widget-subheading">Pengendalian Pencemaran Udara</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>8</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-grow-early">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Laporan PLB3</div>
                            <div class="widget-subheading">Pengelolaan Limbah B3</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>54</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Data Inbond Material Terbaru</div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
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
                                    @foreach ($inbond as $index => $data)
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
                    <div class="d-block text-center card-footer"></div>
                </div>
            </div>
        </div>

        {{-- <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Data Laporan Terbaru</div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nama Perusahaan/Instansi</th>
                                <th>Jenis laporan</th>
                                <th>Tanggal laporan</th>
                                <th>Berkas laporan</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporan as $index => $data)
                                    <tr class="data-row">
                                        <td hidden>
                                            {{ $data->id }}
                                        </td>
                                        <td class="text-center text-muted">{{ ($index+1) }}</td>
                                        <td class="text-muted">{{ $data->nama_instansi_usaha }}</td>
                                        <td class="text-muted">{{ $data->jenis_laporan }}</td>
                                        <td class="text-muted">{{ $data->created_at }}</td>
                                        <td class="text-muted">
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
                    <div class="d-block text-center card-footer"></div>
                </div>
            </div>
        </div> --}}

    </div>
@endsection