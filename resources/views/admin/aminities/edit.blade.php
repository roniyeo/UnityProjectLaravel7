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
                    <p class="text-subtitle text-muted">Edit Aminities</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('aminities') }}">Aminities</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        @foreach ($aminities as $items)
        <form action="{{ route('aminities.update') }}" method="post">
            {{ csrf_field() }}
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        Edit Aminities
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                    <input type="hidden" name="id" value="{{ $items->id }}">
                                    <div class="form-group">
                                        <label for="aminities">Nama Aminities</label>
                                        <input type="text" class="form-control" id="aminities" placeholder="Input Aminities"
                                            value="{{ $items->aminities }}" name="aminities">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-warning btn-sm">Update</button>
                        </div>
                    </div>
                </section>
            </form>
            @endforeach
    </div>
@endsection
