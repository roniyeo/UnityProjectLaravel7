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
                    <p class="text-subtitle text-muted">Create New Partners</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('partners') }}">Partners</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <form action="{{ route('partners.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        Create New Partners
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h6>Nama Partners</h6>
                                    <input type="text" name="nama" id="nama" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h6>Upload Logo Partners</h6>
                                    <input type="file" name="logo" id="logo" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Create</button>
                        <a href="{{ route('partners') }}" class="btn btn-sm btn-secondary">Back</a>
                    </div>
                </div>
            </section>
        </form>
    </div>
@endsection
