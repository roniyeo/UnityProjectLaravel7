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

            <form action="{{ route('agent.property.update') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="kode" value="{{ $property->kode }}">
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Property : {{ $property->title }} - {{ $property->kode }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="mb-3">
                                        <h6>Kategori</h6>
                                        <input type="text" class="form-control" value="@if ($property->purpose == 'sale') Sale @else Rent @endif" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="mb-3">
                                        <h6>Kondisi</h6>
                                        <input type="text" class="form-control" value="@if ($property->kondisi == 'new') New @elseif ($property->kondisi == 'secondary') Secondary @else Tidak Ada @endif" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="mb-3">
                                        <h6>Tipe Rumah</h6>
                                        <input type="text" class="form-control" value="@if ($property->type == 'villa') Villa @elseif ($property->type == 'ruko') Ruko @elseif ($property->type == 'apartment') Apartment @else House @endif" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <h6>Title</h6>
                                        <input type="text" class="form-control" value="{{ $property->title }}" name="title">
                                    </div>
                                </div>
                                @if ($property->purpose == 'sale')
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="mb-3">
                                            <h6>Price</h6>
                                            <input type="text" class="form-control" value="{{ $property->price }}" name="price">
                                        </div>
                                    </div>
                                @else
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="mb-3">
                                            <h6>Price</h6>
                                            <input type="text" class="form-control" value="{{ $property->price }}" name="price">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="mb-3">
                                            <h6>Tipe Price</h6>
                                            <select class="form-control" id="tipe" name="tipe_price">
                                                @foreach ($tipe as $tipeprice)
                                                    <option value="{{ $tipeprice->id }}" {{ $property->tipe_price == $tipeprice->id ? 'selected' : '' }}>{{ $tipeprice->tipe_price }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <h6>Lantai</h6>
                                        <input type="text" class="form-control" value="{{ $property->floor }}" name="floor">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <h6>Kamar Tidur</h6>
                                        <input type="text" class="form-control" value="{{ $property->bedroom }}" name="bedroom">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <h6>Kamar Mandi</h6>
                                        <input type="text" class="form-control" value="{{ $property->bathroom }}" name="bathroom">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <h6>Luas Bangunan</h6>
                                        <input type="text" class="form-control" value="{{ $property->luas_bangunan }}" name="luas_bangunan">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <h6>Luas Tanah</h6>
                                        <input type="text" class="form-control" value="{{ $property->luas_tanah }}" name="luas_tanah">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="mb-3">
                                        <h6>Provinsi</h6>
                                        <select class="form-control" id="provinsi" name="provinsi">
                                            @foreach ($province as $id => $name)
                                                <option value="{{ $id }}" {{ $property->provinsi == $id ? 'selected' : '' }}>{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="mb-3">
                                        <h6>Kota</h6>
                                        <select class="form-control" id="kota" name="kota">
                                            <option value="{{ $cities->id }}" {{ $property->city == $cities->id ? 'selected' : '' }}>{{ $cities->name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="mb-3">
                                        <h6>Daerah</h6>
                                        <select class="form-control" id="daerah" name="daerah">
                                            <option value="{{ $district->id }}" {{ $property->daerah == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="mb-3">
                                        <h6>Alamat</h6>
                                        <textarea class="form-control" rows="3" name="alamat">{{ $property->address }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="mb-3">
                                        <h6>Maps</h6>
                                        <textarea class="form-control" name="maps" rows="3">{{ $property->maps }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="mb-3">
                                        <h6>Deskripsi</h6>
                                        <textarea class="form-control" rows="3" name="deskripsi">{{ $property->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="mb-3">
                                        <h6>Nearby</h6>
                                        <textarea class="form-control" name="nearby" rows="3">{{ $property->nearby }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h6>Aminities</h6>
                                    @foreach ($aminities as $item)
                                    <div class="form-check form-check-inline mb-3">
                                        <input class="form-check-input" type="radio" name="aminities[]"
                                            id="aminities-{{ $item->id }}" value="{{ $item->id }}" @foreach ($property->aminities as $checked)
                                            {{ $checked->id == $item->id ? 'checked' : '' }}
                                        @endforeach>
                                        <label class="form-check-label" for="aminities-{{ $item->id }}">{{ $item->aminities }}</label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
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
                                    @if(Storage::disk('public')->exists('property/'.$property->cover_image))
                                        <img src="{{Storage::url('property/'.$property->cover_image)}}" alt="{{$property->title}}" class="img-thumbnail" width="150">
                                    @endif
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h6>Foto Property</h6>
                                    <div class="mb-3">
                                        <input type="file" class="file" id="foto-input" name="foto[]" multiple>
                                    </div>
                                    <div class="row">
                                        @foreach($property->gallery as $gallery)
                                            <div class="col-lg-3 col-md-3 col-sm-3 gallery-image" id="gallery-{{$gallery->id}}">
                                                <button type="button" data-id="{{$gallery->id}}" class="btn btn-danger btn-sm"><i class="material-icons">X</i></button>
                                                <img class="img-thumbnail" src="{{Storage::url('property/gallery/'.$gallery->name)}}" alt="{{$gallery->name}}" width="150">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-warning">Update</button>
                    <a href="{{ route('property') }}" class="btn btn-sm btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
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
        });

        $(document).on('click','#galleryuploadbutton',function(e){
            e.preventDefault();
            $('#gallaryimageupload').click();
        });

        $('.gallery-image button').on('click',function(e){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            var id = $(this).data('id');
            var image = $('#gallery-'+id+' img').attr('alt');
            $.post("{{route('agent.property.gallery-delete')}}",{id:id,image:image},function(data){
                if(data.msg == true){
                    $('#gallery-'+id).remove();
                }
            });
        });

        var imagesPreview = function(input, placeToInsertImagePreview) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $('<div class="gallery-image-edit" id="gallery-perview-'+i+'"><img src="'+event.target.result+'" height="106" width="173"/></div>').appendTo(placeToInsertImagePreview);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#gallaryimageupload').on('change', function() {
            imagesPreview(this, 'div#gallerybox');
        });
    </script>
@endsection
