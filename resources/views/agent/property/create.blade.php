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

            <form action="{{ route('agent.property.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Create a New Property</h6>
                        </div>
                        <div class="card-body">
                            <h6>Kategori</h6>
                            <select class="form-control" id="kategori" name="kategori">
                                <option value="">Pilih Kategori</option>
                                <option value="sale">For Sale</option>
                                <option value="rent">For Rent</option>
                            </select>
                        </div>
                    </div>

                    <div class="card shadow mb-4 data-properties" id="sale">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">FOR SALE</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm 12">
                                    <div class="mb-3">
                                        <h6>Kondisi</h6>
                                        <select class="form-control" id="kondisi" name="kondisi">
                                            <option value="">Pilih Kondisi</option>
                                            <option value="secondary">Secondary</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm 12">
                                    <div class="mb-3">
                                        <h6>Type</h6>
                                        <select class="form-control" id="tipe" name="tipe">
                                            <option value="">Pilih Tipe Property</option>
                                            <option value="house">House</option>
                                            <option value="apartment">Apartment</option>
                                            <option value="ruko">Ruko</option>
                                            <option value="villa">Villa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <h6>Kode</h6>
                                        <input type="text" name="kode" value="{{ 'UNITY-' . $kdpro }}"
                                            class="form-control" readonly style="background: #dddddd">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <h6>Title</h6>
                                        <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title') }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <h6>Price</h6>
                                        <input type="text" name="price" class="form-control"
                                            placeholder="Harga Jual/Sewa" value="{{ old('price') }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <h6>Lantai</h6>
                                        <input type="text" name="floor" class="form-control"
                                            placeholder="Berapa Lantai" value="{{ old('floor') }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <h6>Kamar Tidur</h6>
                                        <input type="text" name="bedroom" class="form-control"
                                            placeholder="Berapa Kamar Tidur" value="{{ old('bedroom') }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <h6>Kamar Mandi</h6>
                                        <input type="text" name="bathroom" class="form-control"
                                            placeholder="Berapa Kamar Mandi" value="{{ old('bathroom') }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <h6>Luas Bangunan</h6>
                                        <input type="text" name="luas_bangunan" class="form-control"
                                            placeholder="Luas Bangunan" value="{{ old('luas_bangunan') }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <h6>Luas Tanah</h6>
                                        <input type="text" name="luas_tanah" class="form-control"
                                            placeholder="Luas Tanah" value="{{ old('luas_tanah') }}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="mb-3">
                                        <h6>Provinsi</h6>
                                        <select class="form-control" id="provinsi" name="provinsi">
                                            <option value="">Pilih Provinsi</option>
                                            @foreach ($province as $id => $name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="mb-3">
                                        <h6>Kota</h6>
                                        <select class="form-control" id="kota" name="kota">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="mb-3">
                                        <h6>Daerah</h6>
                                        <select class="form-control" id="daerah" name="daerah">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="mb-3">
                                        <h6>Alamat</h6>
                                        <textarea class="form-control" rows="3" name="alamat">{{ old('alamat') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="mb-3">
                                        <h6>Maps</h6>
                                        <textarea class="form-control" name="maps" rows="3">{{ old('maps') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="mb-3">
                                        <h6>Deskripsi</h6>
                                        <textarea class="form-control" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="mb-3">
                                        <h6>Nearby</h6>
                                        <textarea class="form-control" name="nearby" rows="3">{{ old('nearby') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h6>Aminities</h6>
                                    @foreach ($aminities as $item)
                                    <div class="form-check form-check-inline mb-3">
                                        <input class="form-check-input" type="radio" name="aminities[]"
                                            id="aminities-{{ $item->id }}" value="{{ $item->id }}">
                                        <label class="form-check-label" for="aminities-{{ $item->id }}">{{ $item->aminities }}</label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h6>Cover</h6>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="upload">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="browse"
                                                aria-describedby="upload" name="cover">
                                            <label class="custom-file-label" for="browse">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h6>Foto Property</h6>
                                    <div class="mb-3">
                                        <input type="file" class="file" id="foto-input" name="foto[]" multiple>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4 data-properties" id="rent">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">FOR RENT</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm 12">
                                    <div class="mb-3">
                                        <h6>Type</h6>
                                        <select class="form-control" id="tipe" name="tipe">
                                            <option value="">Pilih Tipe Property</option>
                                            <option value="house">House</option>
                                            <option value="apartment">Apartment</option>
                                            <option value="ruko">Ruko</option>
                                            <option value="villa">Villa</option>
                                            <option value="kavling">Kavling</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <h6>Kode</h6>
                                        <input type="text" name="kode" value="{{ 'UNITY-' . $kdpro }}"
                                            class="form-control" readonly style="background: #dddddd">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <h6>Title</h6>
                                        <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="mb-3">
                                        <h6>Price</h6>
                                        <input type="text" name="price" class="form-control"
                                            placeholder="Harga Jual/Sewa" value="{{ old('price') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm 6">
                                    <div class="mb-3">
                                        <h6>Type</h6>
                                        <select class="form-control" id="tipe" name="tipe_price">
                                            <option value="">Pilih Tipe Harga</option>
                                            @foreach ($tipe as $tipeprice)
                                                <option value="{{ $tipeprice->id }}">{{ $tipeprice->tipe_price }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <h6>Lantai</h6>
                                        <input type="text" name="floor" class="form-control"
                                            placeholder="Berapa Lantai" value="{{ old('floor') }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <h6>Kamar Tidur</h6>
                                        <input type="text" name="bedroom" class="form-control"
                                            placeholder="Berapa Kamar Tidur" value="{{ old('bedroom') }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <h6>Kamar Mandi</h6>
                                        <input type="text" name="bathroom" class="form-control"
                                            placeholder="Berapa Kamar Mandi" value="{{ old('bathroom') }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <h6>Luas Bangunan</h6>
                                        <input type="text" name="luas_bangunan" class="form-control"
                                            placeholder="Luas Bangunan" value="{{ old('luas_bangunan') }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <h6>Luas Tanah</h6>
                                        <input type="text" name="luas_tanah" class="form-control"
                                            placeholder="Luas Tanah" value="{{ old('luas_tanah') }}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="mb-3">
                                        <h6>Provinsi</h6>
                                        <select class="form-control" id="provinsi-rent" name="provinsi">
                                            <option value="">Pilih Provinsi</option>
                                            @foreach ($province as $id => $name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="mb-3">
                                        <h6>Kota</h6>
                                        <select class="form-control" id="kota-rent" name="kota">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="mb-3">
                                        <h6>Daerah</h6>
                                        <select class="form-control" id="daerah-rent" name="daerah">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="mb-3">
                                        <h6>Alamat</h6>
                                        <textarea class="form-control" rows="3" name="alamat">{{ old('alamat') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="mb-3">
                                        <h6>Maps</h6>
                                        <textarea class="form-control" name="maps" rows="3">{{ old('maps') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="mb-3">
                                        <h6>Deskripsi</h6>
                                        <textarea class="form-control" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="mb-3">
                                        <h6>Nearby</h6>
                                        <textarea class="form-control" name="nearby" rows="3">{{ old('nearby') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h6>Aminities</h6>
                                    @foreach ($aminities as $item)
                                    <div class="form-check form-check-inline mb-3">
                                        <input class="form-check-input" type="radio" name="aminities[]"
                                            id="aminities-{{ $item->id }}" value="{{ $item->id }}">
                                        <label class="form-check-label" for="aminities-{{ $item->id }}">{{ $item->aminities }}</label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h6>Cover</h6>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="upload">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="browse"
                                                aria-describedby="upload" name="cover">
                                            <label class="custom-file-label" for="browse">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h6>Foto Property</h6>
                                    <div class="mb-3">
                                        <input type="file" class="file" id="foto-input" name="foto[]" multiple>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                </div>
            </form>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#kategori").on('change', function() {
                $(".data-properties").hide();
                $("#" + $(this).val()).fadeIn(700);
            });
            $("#foto-input").fileinput();

            $('#provinsi').change(function () {
                var provinsiID = $(this).val();
                if (provinsiID) {
                    $.ajax({
                        type: 'GET',
                        url: '/getKota?id='+provinsiID,
                        dataType: 'JSON',
                        success: function (response) {
                            if (response) {
                                $("#kota").empty();
                                $("#daerah").empty();
                                $("#kota").append('<option>Pilih Kota</option>');
                                $("#daerah").append('<option>Pilih Daerah</option>');
                                $.each(response,function(nama,kode){
                                    $("#kota").append('<option value="'+kode+'">'+nama+'</option>');
                                });
                            }else{
                                $("#kota").empty();
                                $("#daerah").empty();
                            }
                        }
                    })
                }else{
                    $("#kota").empty();
                    $("#daerah").empty();
                }
            });

            $('#kota').change(function () {
                var kotaID = $(this).val();
                if (kotaID) {
                    $.ajax({
                        type:"GET",
                        url: "/getDaerah?city_id="+kotaID,
                        dataType: 'JSON',
                        success:function(response){
                            if(response){
                                $("#daerah").empty();
                                $("#daerah").append('<option value="">Pilih Daerah</option>');
                                $.each(response,function(nama,kode){
                                    $("#daerah").append('<option value="'+kode+'">'+nama+'</option>');
                                });
                            }else{
                                $("#daerah").empty();
                            }
                        }
                    })
                }else{
                    $("#daerah").empty();
                }
            });

            $('#provinsi-rent').change(function () {
                var provinsiID = $(this).val();
                if (provinsiID) {
                    $.ajax({
                        type: 'GET',
                        url: '/getKota?id='+provinsiID,
                        dataType: 'JSON',
                        success: function (response) {
                            if (response) {
                                $("#kota-rent").empty();
                                $("#daerah-rent").empty();
                                $("#kota-rent").append('<option>Pilih Kota</option>');
                                $("#daerah-rent").append('<option>Pilih Daerah</option>');
                                $.each(response,function(nama,kode){
                                    $("#kota-rent").append('<option value="'+kode+'">'+nama+'</option>');
                                });
                            }else{
                                $("#kota-rent").empty();
                                $("#daerah-rent").empty();
                            }
                        }
                    })
                }else{
                    $("#kota-rent").empty();
                    $("#daerah-rent").empty();
                }
            });

            $('#kota-rent').change(function () {
                var kotaID = $(this).val();
                if (kotaID) {
                    $.ajax({
                        type:"GET",
                        url: "/getDaerah?city_id="+kotaID,
                        dataType: 'JSON',
                        success:function(response){
                            if(response){
                                $("#daerah-rent").empty();
                                $("#daerah-rent").append('<option value="">Pilih Daerah</option>');
                                $.each(response,function(nama,kode){
                                    $("#daerah-rent").append('<option value="'+kode+'">'+nama+'</option>');
                                });
                            }else{
                                $("#daerah-rent").empty();
                            }
                        }
                    })
                }else{
                    $("#daerah-rent").empty();
                }
            });
        });
    </script>
    <script type="text/javascript">
        @if (Session::has('error'))
            toastr.error("{{ session('error') }}")
        @endif
    </script>
@endsection
