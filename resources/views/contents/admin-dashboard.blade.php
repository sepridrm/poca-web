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
                            <div class="widget-heading">Total Izin PPA</div>
                            <div class="widget-subheading">Pengendalian Pencemaran Air</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{{$ippa}}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-arielle-smile">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Izin PPU</div>
                            <div class="widget-subheading">Pengendalian Pencemaran Udara</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{{$ippu}}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-grow-early">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Izin PLB3</div>
                            <div class="widget-subheading">Pengelolaan Limbah B3</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{{$iplb3}}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-midnight-bloom">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Laporan PPA</div>
                            <div class="widget-subheading">Pengendalian Pencemaran Air</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{{$lppa}}</span></div>
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
                            <div class="widget-numbers text-white"><span>{{$lppu}}</span></div>
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
                            <div class="widget-numbers text-white"><span>{{$lplb3}}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Data Izin Terbaru</div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nama Perusahaan/Instansi</th>
                                <th>Jenis izin</th>
                                <th>Tanggal berlaku</th>
                                <th>Berkas perizinan</th>
                                <th>Status perizinan</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($izin as $index => $data)
                                    <tr class="data-row">
                                        <td hidden>
                                            {{ $data->id }}
                                        </td>
                                        <td class="text-center text-muted">{{ ($index+1) }}</td>
                                        <td class="text-muted">{{ $data->nama_instansi_usaha }}</td>
                                        <td class="text-muted">{{ $data->jenis_izin }}</td>
                                        <td class="text-muted">{{ $data->tanggal_berlaku }}</td>
                                        <td class="text-muted">
                                            @php
                                                $path_file = json_decode($data->path_file, true);
                                            @endphp
                                            @foreach ($path_file as $key=>$item)
                                                <a href="{{ url($item) }}">file{{($key+1)}}/ </a>
                                            @endforeach
                                        </td>
                                        <td class="text-muted">{{ $data->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-block text-center card-footer"></div>
                </div>
            </div>
        </div>

        <div class="row">
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
        </div>

    </div>
@endsection