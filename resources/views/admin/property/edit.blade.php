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
                    <p class="text-subtitle text-muted">Edit Properties</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('property') }}">Properties</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <form action="#" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header">
                            Edit Properties : {{ $property->kode }}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <h6>Kode</h6>
                                    <input type="text" class="form-control disabled" id="kode"
                                        value="{{ $property->kode }}" readonly="readonly" disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <h6>Kategori</h6>
                                    <input type="text" class="form-control disabled" id="kategori"
                                        value="{{ $property->purpose }}" readonly="readonly" disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <h6>Kondisi</h6>
                                    <input type="text" class="form-control disabled" id="kondisi"
                                        value="@if ($property->kondisi == null) Tidak Ada @else {{ $property->kondisi }} @endif" readonly="readonly" disabled>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <h6>Title</h6>
                                    <input type="text" class="form-control" value="{{ $property->title }}" name="title">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <h6>Price</h6>
                                    <input type="text" class="form-control" value="{{ $property->price }}" name="price">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <h6>Lantai</h6>
                                    <input type="text" class="form-control" value="{{ $property->floor }}" name="floor">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <h6>Kamar Tidur</h6>
                                    <input type="text" class="form-control" value="{{ $property->bedroom }}" name="bedroom">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <h6>Kamar Mandi</h6>
                                    <input type="text" class="form-control" value="{{ $property->bathroom }}" name="bathroom">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <h6>Luas Bangunan</h6>
                                    <input type="text" class="form-control" value="{{ $property->luas_bangunan }}" name="luas_bangunan">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <h6>Luas Tanah</h6>
                                    <input type="text" class="form-control" value="{{ $property->luas_tanah }}" name="luas_tanah">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h6>Provinsi</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="provinsi" name="provinsi">
                                        @foreach ($province as $id => $name)
                                            <option value="{{ $id }}" {{ $property->provinsi == $id ? 'selected' : '' }}>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <h6>Kota</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="kota" name="kota">
                                        @foreach ($cities as $id => $name)
                                            <option value="{{ $id }}" {{ $property->city == $id ? 'selected' : '' }}>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <h6>Daerah</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="daerah" name="daerah">
                                        @foreach ($district as $id => $name)
                                            <option value="{{ $id }}" {{ $property->daerah == $id ? 'selected' : '' }}>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <h6>Alamat</h6>
                                <textarea class="form-control" rows="3" name="alamat">{{ $property->address }}</textarea>
                            </div>
                            <div class="col-lg-6">
                                <h6>Maps</h6>
                                <textarea class="form-control" rows="3" name="maps">{{ $property->maps }}</textarea>
                            </div>
                            <div class="col-lg-12 my-2">
                                <h6>Deskripsi</h6>
                                <textarea name="deskripsi" id="tinymce" cols="30" rows="10" class="form-control">{{ $property->description }}</textarea>
                            </div>
                            <div class="col-lg-12 my-2">
                                <h6>Nearby</h6>
                                <textarea name="nearby" id="tinymce-nearby" cols="30" rows="10" class="form-control">{{ $property->nearby }}</textarea>
                            </div>
                            <div class="col-lg-12">
                                <h6>Aminities</h6>
                                <ul class="list-unstyled mb-0">
                                    @foreach ($aminities as $a)
                                        <li class="d-inline-block me-2 mb-1">
                                            <div class="form-check">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="aminities-{{ $a->id }}"
                                                        class="form-check-input" name="aminities[]"
                                                        value="{{ $a->id }}" @foreach ($property->aminities as $checked)
                                                            {{ $checked->id == $a->id ? 'checked' : '' }}
                                                        @endforeach>
                                                    <label
                                                        for="aminities-{{ $a->id }}">{{ $a->aminities }}</label>
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
                                    <input class="form-control" type="file" name="cover_image"> <br>
                                    @if(Storage::disk('public')->exists('property/'.$property->cover_image))
                                        <img src="{{Storage::url('property/'.$property->cover_image)}}" alt="{{$property->title}}" class="img-thumbnail" width="150">
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <h6>Foto</h6>
                                    <input id="input-id" type="file" name="foto_property[]" class="file" multiple>
                                    @foreach($property->gallery as $gallery)
                                    <div class="gallery-image-edit" id="gallery-{{$gallery->id}}">
                                        <button type="button" data-id="{{$gallery->id}}" class="btn btn-danger btn-sm"><i class="material-icons">X</i></button>
                                        <img class="img-responsive" src="{{Storage::url('property/gallery/'.$gallery->name)}}" alt="{{$gallery->name}}">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <h6>Price List</h6>
                                    <input class="form-control" type="file" name="price_list" {{ $property->kondisi == 'new' ? '' : 'disabled' }}>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <h6>Site Plan</h6>
                                    <input class="form-control" type="file" name="site_plan" {{ $property->kondisi == 'new' ? '' : 'disabled' }}>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <h6>E Brosur</h6>
                                    <input class="form-control" type="file" name="e_brosur" {{ $property->kondisi == 'new' ? '' : 'disabled' }}>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <h6>Video</h6>
                                    <input class="form-control" type="file" name="video" {{ $property->kondisi == 'new' ? '' : 'disabled' }}>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.gallery-image-edit button').on('click',function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var image = $('#gallery-'+id+' img').attr('alt');
            $.post("{{route('property.gallery-delete')}}",{id:id,image:image},function(data){
                if(data.msg == true){
                    $('#gallery-'+id).remove();
                }
            });
        });

        $(document).ready(function () {
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
        })

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

        $(document).on('click','#galleryuploadbutton',function(e){
            e.preventDefault();
            $('#gallaryimageupload').click();
        })
    </script>
@endsection
