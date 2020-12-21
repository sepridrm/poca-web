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
                            <table id="table_id" class="mb-0 table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th hidden>Id</th>
                                    <th>#</th>
                                    <th>DU ID</th>
                                    <th>DU Name</th>
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
                                                {{ $data->du_id }}
                                            </td>
                                            <td>
                                                {{ $data->du_name }}
                                            </td>
                                            {{-- <td>
                                                @php
                                                    $path_file = json_decode($data->path_file, true);
                                                @endphp
                                                @foreach ($path_file as $key=>$item)
                                                    <a href="{{ url($item) }}">file{{($key+1)}}/ </a>
                                                @endforeach
                                            </td> --}}
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
@endsection