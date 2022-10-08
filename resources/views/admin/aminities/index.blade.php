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
                    <h3>Aminities</h3>
                    <p class="text-subtitle text-muted">Listing Aminities</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Aminities</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <a class="btn btn-primary btn-sm my-3" href="{{ route('aminities.create') }}">Tambah Aminities</a>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    List Aminities
                </div>
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Aminities</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($aminities as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->aminities }}</td>
                                <td>
                                    <a href="{{ route('aminities.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ route('aminities.delete', $item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
    <script src="{{ asset('backend/extensions/jquery/jquery.min.js') }}"></script>
    <script>
        @if (Session::has('success'))
            toastr.success("{{ session('success') }}")
        @endif
    </script>
@endsection
