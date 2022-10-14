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
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('property') }}">Properties</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <form action="{{ route('property.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        Create New Properties
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h6>Pilih Kategori</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="kategori" name="kategori">
                                        <option value="">Pilih Kategori</option>
                                        <option value="sale">For Sale</option>
                                        <option value="rent">For Rent</option>
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card data-properties" id="sale">
                    <div class="card-header">
                        <h6>For Sale</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <h6>Kode</h6>
                                    <input type="text" class="form-control disabled" id="kode"
                                        value="{{ 'UNITY-' . $kdpro }}" name="kode" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <h6>Pilih Kategori</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="tipe" name="tipe">
                                        <option value="">Pilih Tipe</option>
                                        <option value="house">House</option>
                                        <option value="apartment">Apartment</option>
                                        <option value="ruko">Ruko</option>
                                        <option value="villa">Villa</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <h6>Pilih Kondisi</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="kondisi" name="kondisi">
                                        <option value="">Pilih Kondisi</option>
                                        <option value="new">New</option>
                                        <option value="secondary">Secondary</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <h6>Title</h6>
                                    <input type="text" class="form-control" id="title"
                                        placeholder="Title" value="{{ old('title') }}" name="title">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <h6>Price</h6>
                                    <input type="text" class="form-control" id="price"
                                        placeholder="Price" value="{{ old('price') }}"
                                        name="price">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <h6>Lantai</h6>
                                    <input type="text" class="form-control" id="floor"
                                        placeholder="Jumlah Lantai" value="{{ old('floor') }}" name="floor">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <h6>Kamar Tidur</h6>
                                    <input type="text" class="form-control" id="kamar_tidur" placeholder="Kamar Tidur"
                                        value="{{ old('bedroom') }}" name="bedroom">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <h6>Kamar Mandi</h6>
                                    <input type="text" class="form-control" id="kamar_mandi"
                                        placeholder="Kamar Mandi" value="{{ old('bathroom') }}" name="bathroom">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <h6>Luas Bangunan</h6>
                                    <input type="text" class="form-control" id="luas_bangunan"
                                        placeholder="Luas Bangunan" value="{{ old('luas_bangungan') }}"
                                        name="luas_bangunan">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <h6>Luas Tanah</h6>
                                    <input type="text" class="form-control" id="luas_tanah" placeholder="Luas Tanah"
                                        value="{{ old('luas_tanah') }}" name="luas_tanah">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h6>Provinsi</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="provinsi" name="provinsi">
                                        <option value="">Pilih Provinsi</option>
                                        @foreach ($provinces as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <h6>Kota</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="kota" name="kota">
                                        <option value="">Pilih Kota</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <h6>Daerah</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="daerah" name="daerah">
                                        <option value="">Pilih Daerah</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <h6>Alamat</h6>
                                <textarea class="form-control" id="alamat" rows="3" name="alamat"
                                    placeholder="Alamat">{{ old('alamat') }}</textarea>
                            </div>
                            <div class="col-lg-6">
                                <h6>Maps</h6>
                                <textarea class="form-control" id="maps" rows="3" name="maps"
                                    placeholder="Paste a link google maps">{{ old('maps') }}</textarea>
                            </div>
                            <div class="col-lg-12 my-2">
                                <h6>Deskripsi</h6>
                                <textarea name="deskripsi" id="tinymce" cols="30" rows="10" class="form-control">{{ old('deskripsi') }}</textarea>
                            </div>
                            <div class="col-lg-12 my-2">
                                <h6>Nearby</h6>
                                <textarea name="nearby" id="tinymce-nearby" cols="30" rows="10" class="form-control">{{ old('nearby') }}</textarea>
                            </div>
                            <div class="col-lg-12">
                                <h6>Aminities</h6>
                                <ul class="list-unstyled mb-0" id="aminities">
                                    @foreach ($aminitiess as $aminities)
                                        <li class="d-inline-block me-2 mb-1">
                                            <div class="form-check">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="aminities-{{ $aminities->id }}"
                                                        class="form-check-input" name="aminities[]"
                                                        value="{{ $aminities->id }}">
                                                    <label
                                                        for="aminities-{{ $aminities->id }}">{{ $aminities->aminities }}</label>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <h6>Cover</h6>
                                    <input class="form-control" type="file" id="cover_image"
                                        name="cover_image">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <h6>Foto</h6>
                                    <input id="input-id" type="file" name="foto_property[]" class="file" multiple>
                                </div>
                            </div>
                        </div>
                        <div class="row new-properties" id="new">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <h6>Price List</h6>
                                    <input class="form-control" type="file" id="price_list"
                                        name="price_list">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <h6>Site Plan</h6>
                                    <input class="form-control" type="file" id="site_plan"
                                        name="site_plan">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <h6>E Brosur</h6>
                                    <input class="form-control" type="file" id="e_brosur"
                                        name="e_brosur">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <h6>Video</h6>
                                    <input class="form-control" type="file" id="video"
                                        name="video">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card data-properties" id="rent">
                    <div class="card-header">
                        <h6>For Rent</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <h6>Kode</h6>
                                    <input type="text" class="form-control disabled" id="kode_property" value="{{ 'UNITY-' . $kdpro }}" name="kode" readonly>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <h6>Pilih Kategori</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="tipe_property" name="tipe">
                                        <option value="">Pilih Tipe Property</option>
                                        <option value="house">House</option>
                                        <option value="apartment">Apartment</option>
                                        <option value="ruko">Ruko</option>
                                        <option value="villa">Villa</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <h6>Title</h6>
                                    <input type="text" class="form-control" id="title"
                                        placeholder="Title" value="{{ old('title') }}"
                                        name="title">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <h6>Price</h6>
                                    <input type="text" class="form-control" id="price"
                                        placeholder="Price" value="{{ old('price') }}"
                                        name="price">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h6>Tipe Price</h6>
                                <div class="mb-0" id="tipe_price">
                                    @foreach ($tipe_prices as $tipe)
                                    <div class="d-inline-block me-2 mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tipe_price" id="tipe_price-{{ $tipe->id }}" value="{{ $tipe->id }}">
                                            <label class="form-check-label" for="tipe_price-{{ $tipe->id }}">
                                                {{ $tipe->tipe_price }}
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <h6>Lantai</h6>
                                    <input type="text" class="form-control" id="jumlah_lantai"
                                        placeholder="Jumlah Lantai" value="{{ old('floor') }}"
                                        name="floor">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <h6>Kamar Tidur</h6>
                                    <input type="text" class="form-control" id="kamar_tidur"
                                        placeholder="Kamar Tidur" value="{{ old('bedroom') }}" name="bedroom">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <h6>Kamar Mandi</h6>
                                    <input type="text" class="form-control" id="kamar_mandi"
                                        placeholder="Kamar Mandi" value="{{ old('bathroom') }}" name="bathroom">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <h6>Luas Bangunan</h6>
                                    <input type="text" class="form-control" id="luas_bangunan"
                                        placeholder="Luas Bangunan" value="{{ old('luas_bangungan') }}"
                                        name="luas_bangunan">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <h6>Luas Tanah</h6>
                                    <input type="text" class="form-control" id="luas_tanah" placeholder="Luas Tanah"
                                        value="{{ old('luas_tanah') }}" name="luas_tanah">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h6>Provinsi</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="provinsi-rent" name="provinsi">
                                        <option value="">Pilih Provinsi</option>
                                        @foreach ($provinces as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <h6>Kota</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="kota-rent" name="kota">
                                        <option value="">Pilih Kota</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <h6>Daerah</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="daerah-rent" name="daerah">
                                        <option value="">Pilih Daerah</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <h6>Alamat</h6>
                                <textarea class="form-control" id="alamat" rows="3" name="alamat"
                                    placeholder="Alamat">{{ old('alamat') }}</textarea>
                            </div>
                            <div class="col-lg-6">
                                <h6>Maps</h6>
                                <textarea class="form-control" id="maps" rows="3" name="maps"
                                    placeholder="Paste a link google maps">{{ old('maps') }}</textarea>
                            </div>
                            <div class="col-lg-12">
                                <h6>Deskripsi</h6>
                                <textarea name="deskripsi" id="tinymce-rent" cols="30" rows="10" class="form-control">{{ old('deskripsi') }}</textarea>
                            </div>
                            <div class="col-lg-12">
                                <h6>Nearby</h6>
                                <textarea name="nearby" id="tinymce-rent-nearby" cols="30" rows="10" class="form-control">{{ old('nearby') }}</textarea>
                            </div>
                            <div class="col-lg-12">
                                <h6>Aminities</h6>
                                <ul class="list-unstyled mb-0" id="aminities">
                                    @foreach ($aminitiess as $aminities)
                                        <li class="d-inline-block me-2 mb-1">
                                            <div class="form-check">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="aminities-{{ $aminities->id }}"
                                                        class="form-check-input" name="aminities[]"
                                                        value="{{ $aminities->id }}">
                                                    <label
                                                        for="aminities-{{ $aminities->id }}">{{ $aminities->aminities }}</label>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <h6>Cover</h6>
                                    <input class="form-control" type="file" id="cover_image"
                                        name="cover_image">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <h6>Foto</h6>
                                    <input id="input-id" type="file" name="foto_property[]" class="file"
                                        multiple>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
            <a href="{{ route('property') }}" class="btn btn-sm btn-info">Back</a>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#kategori").on('change', function() {
                $(".data-properties").hide();
                $("#" + $(this).val()).fadeIn(700);
            });

            $("#kondisi").on('change', function() {
                $(".new-properties").hide();
                $("#" + $(this).val()).fadeIn(700);
            });
            $("#input-id").fileinput();

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
        $(function() {
            tinymce.init({
                selector: "textarea#tinymce",
                height: 300,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount', 'image'
                ],
                toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_css: '//www.tiny.cloud/css/codepen.min.css'
            });
        });

        $(function () {
            tinymce.init({
                selector: "textarea#tinymce-nearby",
                height: 300,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount', 'image'
                ],
                toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_css: '//www.tiny.cloud/css/codepen.min.css'
            });
        });

        $(function() {
            tinymce.init({
                selector: "textarea#tinymce-rent",
                height: 300,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount', 'image'
                ],
                toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_css: '//www.tiny.cloud/css/codepen.min.css'
            });
        });

        $(function () {
            tinymce.init({
                selector: "textarea#tinymce-rent-nearby",
                height: 300,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount', 'image'
                ],
                toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_css: '//www.tiny.cloud/css/codepen.min.css'
            });
        });
    </script>
    <script type="text/javascript">
        @if (Session::has('error'))
            toastr.error("{{ session('error') }}")
        @endif
    </script>
@endsection
