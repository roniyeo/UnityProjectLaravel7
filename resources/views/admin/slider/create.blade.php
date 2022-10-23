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
                    <h3>Slider</h3>
                    <p class="text-subtitle text-muted">Create New Slider</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('slider') }}">Slider</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        Create New Slider
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h6>Upload Slider (300x200)</h6>
                                    <input type="file" name="slider" id="slider" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Create</button>
                    </div>
                </div>
            </section>
        </form>
    </div>
@endsection
