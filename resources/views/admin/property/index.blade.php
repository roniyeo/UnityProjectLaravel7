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
                    <h3>Properties</h3>
                    <p class="text-subtitle text-muted">Listing Properties</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Properties</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <a class="btn btn-primary btn-sm my-3" href="{{ route('property.create') }}">Tambah Properties</a>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Listing Properties
                </div>
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Cover</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Kondisi</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($properties as $key => $property)
                                <tr>
                                    <td>{{ $property->kode }}</td>
                                    <td>
                                        @if (Storage::disk('public')->exists('property/'.$property->cover_image) && $property->cover_image)
                                            <img src="{{ Storage::url('property/'.$property->cover_image) }}" class="img-thumbnail" width="100">
                                        @endif
                                    </td>
                                    <td>{{ $property->title }}</td>
                                    <td>{{ $property->purpose }}</td>
                                    <td>
                                        @if ($property->kondisi)
                                            {{ $property->kondisi }}
                                        @else
                                            Tidak ada
                                        @endif
                                    </td>
                                    <td>{{ $property->type }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-info" href="{{ route('property.show', $property->kode) }}">Show</a>
                                        <a class="btn btn-sm btn-warning" href="{{ route('property.edit', $property->kode) }}">Edit</a>
                                        <a class="btn btn-sm btn-danger" href="{{ route('property.destroy', $property->kode) }}">Delete</a>
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
    <script type="text/javascript">
        @if (Session::has('success'))
            toastr.success("{{ session('success') }}")
        @endif
    </script>
@endsection
