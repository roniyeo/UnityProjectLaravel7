@extends('layout.frontend')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section spad set-bg" data-setbg="{{ asset('frontend/img/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h4>LISTING PROPERTY</h4>
                        <div class="bt-option">
                            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                            <span>Property</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Property Section Begin -->
    <section class="property-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h4>LISTING PROPERTY</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($properties as $property)
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('properties.show', $property->kode) }}">
                            <div class="property-item">
                                <div class="pi-pic set-bg"
                                    @if (Storage::disk('public')->exists('property/' . $property->cover_image) && $property->cover_image) data-setbg="{{ Storage::url('property/' . $property->cover_image) }}" @else data-setbg="{{ asset('frontend/img/property/property-1.jpg') }}" @endif">
                                    <div class="label">{{ $property->purpose == 'sale' ? 'For Sale' : 'For Rent' }}</div>
                                </div>
                                <div class="pi-text">
                                    @if ($property->purpose == 'sale')
                                        <div class="pt-price">IDR.
                                            {{ number_format($property->price) }}
                                        </div>
                                    @else
                                        <div class="pt-price">IDR.
                                            {{ number_format($property->price) }}<span>
                                                {{ $property->tipe_price == $tipe->id ? $tipe->tipe_price : '' }}</span>
                                        </div>
                                    @endif
                                    <h5 class="font-weight-bold">{{ $property->title }}</h5>
                                    <p><span class="icon_pin_alt"></span> {{ $property->address }}</p>
                                    <ul>
                                        <li><i class="fa fa-object-group"></i> {{ $property->floor }}</li>
                                        <li><i class="fa fa-bed"></i> {{ $property->bedroom }}</li>
                                        <li><i class="fa fa-bathtub"></i> {{ $property->bathroom }}</li>
                                    </ul>
                                    <div class="pi-agent">
                                        <div class="pa-item">
                                            <div class="pa-info">
                                                @if ($property->foto_agent)
                                                    <img src="{{ asset('agents/' . $property->foto_agent) }}"
                                                        alt="">
                                                @else
                                                    <img src="{{ asset('frontend/img/unity.jpg') }}" alt="">
                                                @endif
                                                <h6>{{ $property->kode_agent ? $property->nama_agent : $property->name }}
                                                </h6>
                                            </div>
                                            <div class="pa-text">
                                                {{ $property->nohp ? $property->nohp : '081358856556' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="col-lg-12 justify-content-center">
                    {{-- <div class="loadmore-btn">
                        <a href="#">Load more</a>
                    </div> --}}
                    {{ $properties->links() }}
                </div>
            </div>
        </div>
    </section>
    <!-- Property Section End -->
@endsection
