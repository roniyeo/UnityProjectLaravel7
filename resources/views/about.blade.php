@extends('layout.frontend')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section spad set-bg" data-setbg="{{ asset('frontend/img/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h4>About Us</h4>
                        <div class="bt-option">
                            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                            <span>About</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- About Section Begin -->
    <section class="about-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="about-text">
                        <div class="at-title">
                            <h3>Welcome to Unity Property</h3>
                            <p>Unity Property adalah Perusahaan yang bergerak di jasa pemasaran properti yang bernaung dibawah legalitas PT. Unity Propertindo Sejahtera.</p>
                            <p>Unity Property hadir di Batam dengan visi untuk menjadi agensi properti milenial yang mampu memasarkan properti dengan konsep digital marketing.</p>
                            <p>Unity Property hadir untuk menjawab kebutuhan para investor, para pencari hunian, para pemilik properti, developer properti dengan menyediakan para tenaga pemasar yang di latih secara mumpuni melalui program pelatihan. Supaya developer dan pencari properti terkhususnya di Kota Batam dapat mencari properti dengan pelayanan yang profesional dan maksimal.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="about-pic set-bg" data-setbg="{{ asset('frontend/img/unity.jpg') }}">
                        {{-- <a href="https://www.youtube.com/watch?v=8EJ3zbKTWQ8" class="play-btn video-popup">
                            <i class="fa fa-play-circle"></i>
                        </a> --}}
                    </div>
                </div>
                <div class="col-lg-12">
                    <img src="{{ asset('frontend/img/logo-arebi.png') }}" alt="AREBI" class="img-responsive mx-auto d-block my-3" width="100">
                    <div class="about-text">
                        <div class="at-title text-center">
                            <p>Unity Property juga bergerak di bawah naungan AREBI (Asosiasi Real Estate Broker Indonesia), DPD Kepulauan Riau dengan nomor anggota 2002.000074.A</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <img src="{{ asset('frontend/img/location.png') }}" alt="UNITY PROPERTY" class="img-responsive rounded mx-auto d-block my-3">
                <div class="about-text">
                    <div class="at-title text-center">
                        <h3>Lokasi Kantor</h3>
                        <p>Imperium Superblok Blok A No 35 (Depan Apartement Queen Victoria), Baloi Permai, Batam Kota, 29445</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="about-text">
                    <div class="at-title text-center">
                        <h3>Our Partners</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <img src="{{ asset('partners/pkp.png') }}" alt="">
                        </div>
                        <div class="col-lg-2">
                            <img src="{{ asset('partners/new/1.png') }}" alt="">
                        </div>
                        <div class="col-lg-2">
                            <img src="{{ asset('partners/new/2.png') }}" alt="">
                        </div>
                        <div class="col-lg-2">
                            <img src="{{ asset('partners/abp.png') }}" alt="">
                        </div>
                        <div class="col-lg-2">
                            <img src="{{ asset('partners/central.png') }}" alt="">
                        </div>
                        <div class="col-lg-2">
                            <img src="{{ asset('partners/bci.png') }}" alt="">
                        </div>
                        <div class="col-lg-2">
                            <img src="{{ asset('partners/new/3.png') }}" alt="">
                        </div>
                        <div class="col-lg-2">
                            <img src="{{ asset('partners/new/4.png') }}" alt="">
                        </div>
                        <div class="col-lg-2">
                            <img src="{{ asset('partners/jpk.png') }}" alt="">
                        </div>
                        <div class="col-lg-2">
                            <img src="{{ asset('partners/new/5.png') }}" alt="">
                        </div>
                        <div class="col-lg-2">
                            <img src="{{ asset('partners/new/6.png') }}" alt="">
                        </div>
                        <div class="col-lg-2">
                            <img src="{{ asset('partners/new/7.png') }}" alt="">
                        </div>
                        <div class="col-lg-2">
                            <img src="{{ asset('partners/bis.png') }}" alt="">
                        </div>
                        <div class="col-lg-2">
                            <img src="{{ asset('partners/paragon.png') }}" alt="">
                        </div>
                        <div class="col-lg-2">
                            <img src="{{ asset('partners/new/8.png') }}" alt="">
                        </div>
                        <div class="col-lg-2">
                            <img src="{{ asset('partners/jiarmah.png') }}" alt="">
                        </div>
                        <div class="col-lg-2">
                            <img src="{{ asset('partners/opus.png') }}" alt="">
                        </div>
                        <div class="col-lg-2">
                            <img src="{{ asset('partners/oneavenue.png') }}" alt="">
                        </div>
                        <div class="col-lg-2">
                            <img src="{{ asset('partners/belian.png') }}" alt="">
                        </div>
                        <div class="col-lg-2">
                            <img src="{{ asset('partners/papamama.png') }}" alt="">
                        </div>
                        <div class="col-lg-2">
                            <img src="{{ asset('partners/mbg.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->
@endsection
