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
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="at-title">
                            <h3>Welcome to Unity Property</h3>
                            <p>Real Estate Agency Company PT Unity Propertindo Sejahtera 📌 Batam Terima jasa titip jual,
                                sewa properti Batam Terima konsultasi legalitas Properti</p>
                        </div>
                        <div class="at-feature">
                            <div class="af-item">
                                <div class="af-icon">
                                    <img src="{{ asset('frontend/img/chooseus/chooseus-icon-1.png') }}" alt="">
                                </div>
                                <div class="af-text">
                                    <h6>Find your future home</h6>
                                    <p>We help you find a new home by offering a smart real estate.</p>
                                </div>
                            </div>
                            <div class="af-item">
                                <div class="af-icon">
                                    <img src="{{ asset('frontend/img/chooseus/chooseus-icon-2.png') }}" alt="">
                                </div>
                                <div class="af-text">
                                    <h6>Experienced agents</h6>
                                    <p>Find an agent who knows your market best</p>
                                </div>
                            </div>
                            <div class="af-item">
                                <div class="af-icon">
                                    <img src="{{ asset('frontend/img/chooseus/chooseus-icon-3.png') }}" alt="">
                                </div>
                                <div class="af-text">
                                    <h6>Buy or rent homes</h6>
                                    <p>Millions of houses and apartments in your favourite cities</p>
                                </div>
                            </div>
                            <div class="af-item">
                                <div class="af-icon">
                                    <img src="{{ asset('frontend/img/chooseus/chooseus-icon-4.png') }}" alt="">
                                </div>
                                <div class="af-text">
                                    <h6>List your own property</h6>
                                    <p>Sign up now and sell or rent your own properties</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-pic set-bg" data-setbg="{{ asset('frontend/img/about-us.jpg') }}">
                        <a href="https://www.youtube.com/watch?v=8EJ3zbKTWQ8" class="play-btn video-popup">
                            <i class="fa fa-play-circle"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->
@endsection
