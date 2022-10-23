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
                    <h3>Partners</h3>
                    <p class="text-subtitle text-muted">Listing Partners</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Slider</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <a class="btn btn-primary btn-sm my-3" href="{{ route('partners.create') }}">Tambah Partners</a>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    List Partners
                </div>
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Partners</th>
                                <th>Logo Partners</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($partners as $partner)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $partner->title }}</td>
                                <td>
                                    <img src="{{ asset('partners/' . $partner->image) }}" class="img-thumbnail" width="150">
                                </td>
                                <td>
                                    <a href="{{ route('partners.edit', $partner->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ route('partners.delete', $partner->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
