@extends('layout.backend')
@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Agent</h3>
                    <p class="text-subtitle text-muted">Listing Agent</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Agent</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <a class="btn btn-primary btn-sm my-3" href="{{ route('agent.create') }}">Tambah Agent</a>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Data Agent
                </div>
                <div class="card-body">
                    <table class="table table-responsive-xl" id="table1">
                        <thead>
                            <tr>
                                <th>Kode Agent</th>
                                <th>Nama Agent</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Alamat</th>
                                <th>Foto Agent</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agents as $agent)
                                <tr>
                                    <td>{{ $agent->kode_unity }}</td>
                                    <td>{{ $agent->nama_agent }}</td>
                                    <td>{{ $agent->email }}</td>
                                    <td>{{ $agent->nohp }}</td>
                                    <td>{{ $agent->alamat }}</td>
                                    <td><img src="{{ URL::to('/') }}/agents/{{ $agent->foto_agent }}" class="img-thumbnail" width="75" /></td>
                                    <td>
                                        <input data-id="{{ $agent->kode_unity }}" class="toggle-class" type="checkbox" data-onstyle="success"
                                            data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $agent->status ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <a href="{{ route('agent.edit', $agent->kode_unity) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="{{ route('agent.delete', $agent->kode_unity) }}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <script>
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var kode_unity = $(this).data('id');
                console.log(status);
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "/agentChangeStatus",
                    data: {
                        'status': status,
                        'kode_unity': kode_unity
                    },
                    success: function(data) {
                        console.log(data.success)
                    }
                });
            });
        });
    </script>
@endsection
