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
                <p class="text-subtitle text-muted">Show Properties</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('property') }}">Properties</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                Data Property : {{ $property->title }} & {{ $property->kode }}
            </div>
            <div class="card-body">
                <div class="row">
                    <table class="mx-2">
                        <tr>
                            <td>Kode</td>
                            <td>:</td>
                            <td>{{ $property->kode }}</td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td>:</td>
                            <td>{{ $property->title }}</td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>:</td>
                            <td>{{ $property->price }}</td>
                        </tr>
                        <tr>
                            <td>Tipe Price</td>
                            <td>:</td>
                            <td>{{ $tipe->tipe_price }}</td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>:</td>
                            <td>{{ $property->purpose }}</td>
                        </tr>
                        <tr>
                            <td>Kondisi</td>
                            <td>:</td>
                            <td>
                                @if ($property->kondisi)
                                    {{ $property->kondisi }}
                                @else
                                    Tidak Ada
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Tipe Property</td>
                            <td>:</td>
                            <td>{{ $property->type }}</td>
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
                            <td>{{ $property->luas_bangunan }} m2</td>
                        </tr>
                        <tr>
                            <td>Luas Tanah</td>
                            <td>:</td>
                            <td>{{ $property->luas_tanah }} m2</td>
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
                            <td>Deskripsi</td>
                            <td>:</td>
                            <td>{{ $property->description }}</td>
                        </tr>
                        <tr>
                            <td>Nearby</td>
                            <td>:</td>
                            <td>{{ $property->nearby }}</td>
                        </tr>
                        <tr>
                            <td>Brosur</td>
                            <td>:</td>
                            <td>
                                @if ( $property->brosur )
                                    <a href="{{Storage::url('property/brosur'.$property->brosur)}}" download>Brosur</a>
                                @else
                                    Tidak Ada
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Site Plan</td>
                            <td>:</td>
                            <td>
                                @if ( $property->site_plan )
                                    <a href="{{Storage::url('property/siteplan'.$property->site_plan)}}" download>Site Plan</a>
                                @else
                                    Tidak Ada
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Price List</td>
                            <td>:</td>
                            <td>
                                @if ( $property->price_list )
                                    <a href="{{Storage::url('property/pricelist'.$property->price_list)}}" download>Price List</a>
                                @else
                                    Tidak Ada
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Video</td>
                            <td>:</td>
                            <td>
                                @if ( $property->video )
                                    <a href="{{Storage::url('property/video'.$property->video)}}" download>Video</a>
                                @else
                                    Tidak Ada
                                @endif
                            </td>
                        </tr>
                    </table>
                    <div class="col-lg-3 my-2">
                        <h6>Cover Image</h6>
                        <img class="img-thumbnail" src="{{Storage::url('property/'.$property->cover_image)}}" alt="{{$property->title}}" width="150">
                    </div>
                    <div class="col-lg-9 my-2">
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
    </section>
    <a href="{{ route('property') }}" class="btn btn-sm btn-info w-25">Back</a>
</div>
@endsection
