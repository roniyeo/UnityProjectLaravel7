@extends('layout.agents.agent')
@section('content')
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

            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Listing Property</h1>
                </div>
                <a href="{{ route('agent.property.create') }}" class="btn btn-sm btn-primary my-2">Tambah Property</a>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Property</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                    @if ($property)
                                        <tr>
                                            <td>{{ $property->kode }}</td>
                                            <td>
                                                @if (Storage::disk('public')->exists('property/'.$property->cover_image) && $property->cover_image)
                                                    <img src="{{ Storage::url('property/'.$property->cover_image) }}" class="img-thumbnail" width="100">
                                                @endif
                                            </td>
                                            <td>{{ $property->title }}</td>
                                            <td>
                                                @if ($property->purpose == 'sale')
                                                    Sale
                                                @else
                                                    Rent
                                                @endif
                                            </td>
                                            <td>
                                                @if ($property->kondisi)
                                                    {{ $property->kondisi }}
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                            <td>{{ $property->type }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-info" href="{{ route('agent.property.show', $property->kode) }}">Show</a>
                                                <a class="btn btn-sm btn-warning" href="{{ route('agent.property.edit', $property->kode) }}">Edit</a>
                                                <a class="btn btn-sm btn-danger" href="{{ route('agent.property.delete', $property->kode) }}">Delete</a>
                                            </td>
                                        </tr>
                                    @else
                                        <tr class="text-center">
                                            <td colspan="7">Tidak Ada Data</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
