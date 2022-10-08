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
                    <h3>Tipe Price</h3>
                    <p class="text-subtitle text-muted">Listing Tipe Price</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tipe Price</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <a class="btn btn-primary btn-sm my-3" href="{{ route('tipeprice.create') }}">Tambah Tipe Price</a>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    List Tipe Price
                </div>
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Tipe Price</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($tipe_prices as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->tipe_price }}</td>
                                <td>
                                    <a href="{{ route('tipeprice.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ route('tipeprice.delete', $item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection
