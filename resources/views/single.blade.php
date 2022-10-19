@extends('layout.frontend')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section spad set-bg" data-setbg="{{ asset('frontend/img/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h4>Profile</h4>
                        <div class="bt-option">
                            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                            <a href="{{ route('agency') }}">Agents</a>
                            <span>Profile</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Profile Section Begin -->
    <section class="profile-section spad">
        <div class="container">
            <div class="profile-agent-content">
                <div class="row">
                    @foreach ($agency as $profile)
                    <div class="col-lg-6">
                        <div class="profile-agent-info">
                            <div class="pi-pic">
                                <img src="{{ asset('agents/' . $profile->foto_agent) }}" alt="{{ $profile->nama_agent }}">
                            </div>
                            <div class="pi-text">
                                <h5>{{ $profile->nama_agent }}</h5>
                                <p>Agent</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="profile-agent-widget">
                            <ul>
                                <li>Property <span>{{ $total }}</span></li>
                                <li>Email <span>{{ $profile->email }}</span></li>
                                <li>Phone <span>{{ $profile->nohp }}</span></li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Profile Section End -->

    <!-- Property Section Begin -->
    <section class="property-section profile-page spad">
        <div class="container">
            <div class="row">
                @foreach ($properties as $property)
                <div class="col-lg-4">
                    <div class="property-item">
                        <div class="pi-pic set-bg" @if (Storage::disk('public')->exists('property/' . $property->cover_image) && $property->cover_image) data-setbg="{{ Storage::url('property/' . $property->cover_image) }}" @else data-setbg="{{ asset('frontend/img/property/property-1.jpg') }}" @endif>
                            <div class="label">{{ $property->purpose == 'sale' ? 'For Sale' : 'For Rent' }}</div>
                        </div>
                        <div class="pi-text">
                            <div class="pt-price">IDR.
                                {{ number_format($property->price) }}<span>/{{ $property->tipe_price ? $property->tipe_harga : '' }}</span></div>
                            <h5><a href="#">{{ $property->title }}</a></h5>
                            <p><span class="icon_pin_alt"></span> {{ $property->address }}</p>
                            <ul>
                                <li><i class="fa fa-object-group"></i> {{ $property->floor }}</li>
                                <li><i class="fa fa-bed"></i> {{ $property->bedroom }}</li>
                                <li><i class="fa fa-bathtub"></i> {{ $property->bathroom }}</li>
                            </ul>
                            <div class="pi-agent">
                                <div class="pa-item">
                                    <div class="pa-info">
                                        <img src="{{ asset('agents/' . $property->foto_agent) }}" alt="{{ $property->nama_agent }}">
                                        <h6>{{ $property->nama_agent }}</h6>
                                    </div>
                                    <div class="pa-text">
                                        {{ $property->nohp }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- <div class="col-lg-12">
                    <div class="property-pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#" class="icon"><span class="arrow_right"></span></a>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- Property Section End -->
@endsection
