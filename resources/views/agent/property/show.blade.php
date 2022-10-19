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
                    <h1 class="h3 mb-0 text-gray-800">Show Property : {{ $property->title }}</h1>
                </div>
                <a href="{{ route('agent.property') }}" class="btn btn-sm btn-secondary my-2">Back</a>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Property</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table-borderless" id="dataTable" cellspacing="0">
                                <tr>
                                    <td>Title</td>
                                    <td>:</td>
                                    <td>{{ $property->title }}</td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td>:</td>
                                    <td>IDR. {{ $property->price }}</td>
                                </tr>
                                @if ($property->tipe_price)
                                    <tr>
                                        <td>Tipe Price</td>
                                        <td>:</td>
                                        <td>{{ $tipe->tipe_price }}</td>
                                    </tr>
                                @endif
                                @if ($property->kondisi)
                                    <tr>
                                        <td>Kondisi</td>
                                        <td>:</td>
                                        <td>
                                            @if ($property->kondisi == 'new')
                                                New
                                            @else
                                                Secondary
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                                <tr>
                                    <td>Kategori</td>
                                    <td>:</td>
                                    <td>
                                        @if ($property->purpose == 'Sale')
                                            Sale
                                        @else
                                            Rent
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tipe Rumah</td>
                                    <td>:</td>
                                    <td>
                                        @if ($property->type == 'villa')
                                            House
                                        @elseif ($property->type == 'apartment')
                                            Apartment
                                        @elseif ($property->type == 'ruko')
                                            Ruko
                                        @else
                                            House
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Lantai</td>
                                    <td>:</td>
                                    <td>{{ $property->floor }}</td>
                                </tr>
                                <tr>
                                    <td>Kamar Tidur</td>
                                    <td>:</td>
                                    <td>{{ $property->bedroom }}</td>
                                </tr>
                                <tr>
                                    <td>Kamar Mandi</td>
                                    <td>:</td>
                                    <td>{{ $property->bathroom }}</td>
                                </tr>
                                <tr>
                                    <td>Luas Bangunan</td>
                                    <td>:</td>
                                    <td>{{ $property->luas_bangunan }} m<sup style="color: grey">2</sup></td>
                                </tr>
                                <tr>
                                    <td>Luas Tanah</td>
                                    <td>:</td>
                                    <td>{{ $property->luas_tanah }} m<sup style="color: grey">2</sup></td>
                                </tr>
                                <tr>
                                    <td>Provinsi</td>
                                    <td>:</td>
                                    <td>{{ $provinsi->name }}</td>
                                </tr>
                                <tr>
                                    <td>Kota</td>
                                    <td>:</td>
                                    <td>{{ $kota->name }}</td>
                                </tr>
                                <tr>
                                    <td>Daerah</td>
                                    <td>:</td>
                                    <td>{{ $daerah->name }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>{{ $property->address }}</td>
                                </tr>
                                <tr>
                                    <td>Maps</td>
                                    <td>:</td>
                                    <td>{{ $property->maps }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    @if ($property->status == 1)
                                    <td class="text-success">Approved</td>
                                    @else
                                    <td class="text-danger">Pending</td>
                                    @endif
                                </tr>
                            </table>
                        </div>
                        <div class="row my-3">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <h6>Deskripsi</h6>
                                <p>{{ $property->description }}</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <h6>Nearby</h6>
                                <p>{{ $property->nearby }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h6>Cover Image</h6>
                                <img class="img-thumbnail" src="{{Storage::url('property/'.$property->cover_image)}}" alt="{{$property->title}}" width="150">
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9">
                                <h6>Foto Property</h6>
                                @if (!$property->gallery->isEmpty())
                                    @foreach($property->gallery as $gallery)
                                        <img class="img-thumbnail" src="{{Storage::url('property/gallery/'.$gallery->name)}}" alt="{{$property->title}}" width="150">
                                    @endforeach
                                @endif
                            </div>
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
