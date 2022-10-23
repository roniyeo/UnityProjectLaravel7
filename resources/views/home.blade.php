@extends('layout.frontend')
@section('content')
    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="container">
            <div class="hs-slider owl-carousel" id="hs-slider">
                @foreach ($slider as $slideshow)
                    @if ($slideshow->image)
                        <div class="hs-item set-bg" data-setbg="{{ asset('slider/' . $slideshow->image) }}"></div>
                    @else
                        <div class="hs-item set-bg" data-setbg="https://via.placeholder.com/300x200">
                        </div>
                    @endif
                @endforeach
                {{-- <div class="hs-item set-bg" data-setbg="https://via.placeholder.com/300x200">
                </div>
                <div class="hs-item set-bg" data-setbg="{{ asset('frontend/img/hero/hero-2.jpg') }}">
                </div>
                <div class="hs-item set-bg" data-setbg="{{ asset('frontend/img/hero/hero-3.jpg') }}">
                </div> --}}
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Search Section Begin -->
    <section class="search-section spad">
        <form action="{{ route('search') }}" method="GET">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <h4 class="section-title">Where would you rather live?</h4>
                    </div>
                    <div class="col-lg-5">
                        <div class="change-btn">
                            <div class="cb-item">
                                <label for="cb-sale">
                                    For Sale
                                    <input type="radio" id="cb-sale" name="kategori" value="sale">
                                </label>
                            </div>
                            <div class="cb-item">
                                <label for="cb-rent">
                                    For Rent
                                    <input type="radio" id="cb-rent" name="kategori" value="rent">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-6 mb-3">
                        <input type="text" name="title" id="title" class="form-control"
                            placeholder="Search by Title">
                    </div>
                    <div class="col-lg-6 mb-3">
                        <select name="price" id="price" class="form-control">
                            <option value="">Pilih Harga</option>
                            {{-- <option value="price >= 0 AND price <= 150000">0 - 150000</option> --}}
                            <option value="price >= 0 AND price <= 300000000">0 - 300000000</option>
                            <option value="price >= 300000000 AND price <= 600000000">300000000 - 600000000</option>
                            <option value="price >= 600000000 AND price <= 900000000">600000000 - 900000000</option>
                            <option value="price >= 900000000 AND price <= 12000000000">900000000 - 12000000000</option>
                            <option value="price >= 12000000000">12000000000 - Di Atas</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <select name="kota" id="kota" class="form-control">
                            <option value="">Pilih Kota</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <select name="tipe_rumah" id="tipe_rumah" class="form-control">
                            <option value="">Pilih Tipe Rumah</option>
                            <option value="house">Rumah</option>
                            <option value="ruko">Ruko</option>
                            <option value="apartment">Apartment</option>
                            <option value="villa">Villa</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <select name="kondisi" id="kondisi" class="form-control">
                            <option value="">Pilih Kondisi</option>
                            <option value="new">New</option>
                            <option value="secondary">Secondary</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Search Property</button>
            </div>
        </form>
    </section>
    <!-- Search Section End -->

    <!-- Property Section Begin -->
    <section class="property-section latest-property-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title">
                        <h4>Latest PROPERTY</h4>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="property-controls">
                        <ul>
                            <li data-filter=".all">All</li>
                            <li data-filter=".house">Rumah</li>
                            <li data-filter=".ruko">Ruko</li>
                            <li data-filter=".apartment">Apartment</li>
                            <li data-filter=".villa">Villa</li>
                            <li data-filter=".kavling">Kavling</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row property-filter">
                @foreach ($properties as $property)
                    <div class="col-lg-4 col-md-6 mix all {{ $property->type }}">
                        <div class="property-item">
                            <div class="pi-pic set-bg"
                                @if (Storage::disk('public')->exists('property/' . $property->cover_image) && $property->cover_image) data-setbg="{{ Storage::url('property/' . $property->cover_image) }}" @else data-setbg="{{ asset('frontend/img/property/property-1.jpg') }}" @endif">
                                <div class="label">{{ $property->purpose == 'sale' ? 'For Sale' : 'For Rent' }}</div>
                            </div>
                            <div class="pi-text">
                                <div class="pt-price">IDR.
                                    {{ number_format($property->price) }}<span>/{{ $property->tipe_price ? $property->tipe_harga : '' }}</span>
                                </div>
                                <h5><a href="{{ route('properties.show', $property->kode) }}">{{ $property->title }}</a></h5>
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
                                                <img src="{{ asset('agents/' . $property->foto_agent) }}" alt="">
                                            @else
                                                <img src="{{ asset('frontend/img/unity.jpg') }}" alt="">
                                            @endif
                                            <h6>{{ $property->kode_agent ? $property->nama_agent : $property->name }}</h6>
                                        </div>
                                        <div class="pa-text">
                                            {{ $property->nohp ? $property->nohp : '081358856556' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Property Section End -->

    <!-- Chooseus Section Begin -->
    {{-- <section class="chooseus-section spad set-bg" data-setbg="{{ asset('frontend/img/chooseus/chooseus-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="chooseus-text">
                        <div class="section-title">
                            <h4>Why choose us</h4>
                        </div>
                        <p>Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                    <div class="chooseus-features">
                        <div class="cf-item">
                            <div class="cf-pic">
                                <img src="{{ asset('frontend/img/chooseus/chooseus-icon-1.png') }}" alt="">
                            </div>
                            <div class="cf-text">
                                <h5>Find your future home</h5>
                                <p>We help you find a new home by offering a smart real estate.</p>
                            </div>
                        </div>
                        <div class="cf-item">
                            <div class="cf-pic">
                                <img src="{{ asset('frontend/img/chooseus/chooseus-icon-2.png') }}" alt="">
                            </div>
                            <div class="cf-text">
                                <h5>Buy or rent homes</h5>
                                <p>Millions of houses and apartments in your favourite cities</p>
                            </div>
                        </div>
                        <div class="cf-item">
                            <div class="cf-pic">
                                <img src="{{ asset('frontend/img/chooseus/chooseus-icon-3.png') }}" alt="">
                            </div>
                            <div class="cf-text">
                                <h5>Experienced agents</h5>
                                <p>Find an agent who knows your market best</p>
                            </div>
                        </div>
                        <div class="cf-item">
                            <div class="cf-pic">
                                <img src="{{ asset('frontend/img/chooseus/chooseus-icon-4.png') }}" alt="">
                            </div>
                            <div class="cf-text">
                                <h5>List your own property</h5>
                                <p>Sign up now and sell or rent your own properties</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Chooseus Section End -->

    <!-- Team Section Begin -->
    <section class="team-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="section-title">
                        <h4>Agents</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="team-btn">
                        <a href="{{ route('agency') }}"><i class="fa fa-user"></i> All Agent</a>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($agents as $agent)
                    @if ($agent)
                    <div class="col-md-3">
                        <div class="ts-item">
                            <div class="ts-text">
                                <img src="{{ asset('agents/' . $agent->foto_agent) }}" alt="{{ $agent->nama_agent }}">
                                <h5>{{ $agent->nama_agent }}</h5>
                                <span>{{ $agent->nohp }}</span>
                                <a href="https://wa.me/62{{ $agent->nohp }}" class="btn btn-success btn-sm">Whatsapp</a>
                                <a href="{{ route('agency.show', $agent->kode_unity) }}" class="btn btn-secondary btn-sm">Show</a>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-md-12">
                        <h5 class="text-center">No Agent</h5>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- Team Section End -->

    <!-- Logo Carousel Begin -->
    <div class="logo-carousel">
        <div class="container">
            <div class="lc-slider owl-carousel">
                <a href="#" class="lc-item">
                    <div class="lc-item-inner">
                        <img src="{{ asset('partners/pkp.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="lc-item">
                    <div class="lc-item-inner">
                        <img src="{{ asset('partners/new/1.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="lc-item">
                    <div class="lc-item-inner">
                        <img src="{{ asset('partners/new/2.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="lc-item">
                    <div class="lc-item-inner">
                        <img src="{{ asset('partners/abp.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="lc-item">
                    <div class="lc-item-inner">
                        <img src="{{ asset('partners/central.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="lc-item">
                    <div class="lc-item-inner">
                        <img src="{{ asset('partners/bci.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="lc-item">
                    <div class="lc-item-inner">
                        <img src="{{ asset('partners/new/3.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="lc-item">
                    <div class="lc-item-inner">
                        <img src="{{ asset('partners/new/4.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="lc-item">
                    <div class="lc-item-inner">
                        <img src="{{ asset('partners/jpk.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="lc-item">
                    <div class="lc-item-inner">
                        <img src="{{ asset('partners/new/5.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="lc-item">
                    <div class="lc-item-inner">
                        <img src="{{ asset('partners/new/6.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="lc-item">
                    <div class="lc-item-inner">
                        <img src="{{ asset('partners/new/7.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="lc-item">
                    <div class="lc-item-inner">
                        <img src="{{ asset('partners/bis.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="lc-item">
                    <div class="lc-item-inner">
                        <img src="{{ asset('partners/paragon.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="lc-item">
                    <div class="lc-item-inner">
                        <img src="{{ asset('partners/new/8.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="lc-item">
                    <div class="lc-item-inner">
                        <img src="{{ asset('partners/jiarmah.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="lc-item">
                    <div class="lc-item-inner">
                        <img src="{{ asset('partners/opus.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="lc-item">
                    <div class="lc-item-inner">
                        <img src="{{ asset('partners/oneavenue.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="lc-item">
                    <div class="lc-item-inner">
                        <img src="{{ asset('partners/belian.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="lc-item">
                    <div class="lc-item-inner">
                        <img src="{{ asset('partners/papamama.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="lc-item">
                    <div class="lc-item-inner">
                        <img src="{{ asset('partners/mbg.png') }}" alt="">
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Logo Carousel End -->
@endsection
