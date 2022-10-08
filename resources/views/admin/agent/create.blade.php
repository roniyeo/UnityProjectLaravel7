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
                    <p class="text-subtitle text-muted">Create New Agent</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('agent') }}">Agent</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <form action="{{ route('agent.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        Create New Agent
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="kode_unity">Kode Agent</label>
                                    <input type="text" class="form-control" name="kode_unity" id="kode_unity" value="{{ 'UP-AGENT-'.$kd }}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username Agent" value="{{ old('username') }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="nama_agent">Nama Agent</label>
                                    <input type="text" class="form-control" id="nama_agent" name="nama_agent" placeholder="Nama Agent Baru" value="{{ old('nama_agent') }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}" name="email">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="nohp">Nomor HP (WA)</label>
                                    <input type="text" class="form-control" id="nohp" placeholder="Isi nomor hp agent" value="{{ old('nohp') }}" name="nohp">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" placeholder="Alamat agent" value="{{ old('alamat') }}" name="alamat">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="foto_agent" class="form-label">Foto Agent</label>
                                    <input class="form-control" type="file" id="foto_agent" name="foto_agent">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm w-25">Add</button>
                    </div>
                </div>
            </section>
        </form>
    </div>

@endsection
