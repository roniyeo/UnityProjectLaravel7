@extends('layout.agents.agent')
@section('content')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <span>Kode Agent : {{ $data->kode_unity }}</span>
                </form>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $data->nama_agent }}</span>
                            <img class="img-profile rounded-circle" src="{{ url('agents/' . $data->foto_agent) }}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('agent.logout') }}">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">MY PROFILE</h1>
                </div>

                <form action="{{ route('agent.profile.update') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">RONI ZEKI</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <h6>Nama Agent</h6>
                                <input type="text" class="form-control" value="{{ $data->nama_agent }}" name="nama_agent">
                            </div>
                            <div class="form-group">
                                <h6>Email</h6>
                                <input type="text" class="form-control" value="{{ $data->email }}" name="email">
                            </div>
                            <div class="form-group">
                                <h6>No HP</h6>
                                <input type="text" class="form-control" value="{{ $data->nohp }}" name="nohp">
                            </div>
                            <div class="form-group">
                                <h6>Alamat</h6>
                                <input type="text" class="form-control" value="{{ $data->alamat }}" name="alamat">
                            </div>
                            <div class="form-group">
                                <h6>Foto Agent</h6>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="upload">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="browse"
                                            aria-describedby="upload" name="foto_agent">
                                        <label class="custom-file-label" for="browse">Choose file</label>
                                    </div>
                                </div>
                                <img src="{{ url('agents/'. $data->foto_agent) }}" class="rounded mx-auto d-block" alt="{{ $data->nama_agent }}" width="150">
                                <input type="hidden" name="hidden_image" value="{{ $data->foto_agent }}" />
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-warning">Update</button>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Unity Property 2022</span>
                </div>
            </div>
        </footer>

    </div>
@endsection
