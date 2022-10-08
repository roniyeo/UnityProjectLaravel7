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
                    <p class="text-subtitle text-muted">Edit Tipe Price</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('tipeprice') }}">Tipe Price</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        @foreach ($tipe_prices as $edit)
            <form action="{{ route('tipeprice.update') }}" method="post">
                {{ csrf_field() }}
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Edit Tipe Price : {{ $edit->id }}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tipe_price">Nama Tipe Price</label>
                                        <input type="text" class="form-control" id="tipe_price" placeholder="Input Tipe Price"
                                            value="{{ $edit->tipe_price }}" name="tipe_price">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                        </div>
                    </div>
                </section>
            </form>
        @endforeach
    </div>
@endsection
