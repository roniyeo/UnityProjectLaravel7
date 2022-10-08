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
                    <p class="text-subtitle text-muted">Create New Properties</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('aminities') }}">Aminities</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <form action="{{ route('aminities.store') }}" method="post">
            {{ csrf_field() }}
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        Create New Aminities
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="aminities">Nama Aminities</label>
                                    <input type="text" class="form-control" id="aminities" placeholder="Input Aminities"
                                        value="{{ old('aminities') }}" name="aminities">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Add</button>
                    </div>
                </div>
            </section>
        </form>
    </div>
@endsection
