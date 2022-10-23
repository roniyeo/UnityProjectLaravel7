@extends('layout.frontend')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section spad set-bg" data-setbg="{{ asset('frontend/img/breadcrumb-contact-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h4>Contact Us</h4>
                        <div class="bt-option">
                            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                            <span>Contact</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Form Section Begin -->
    <section class="contact-form-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cf-content">
                        <div class="cc-title">
                            <h4>Contact Us</h4>
                            {{-- <p>Terima kasih atas ketertarikan anda akan perusahaan dan pelayanan kami. Silahkan tinggalkan pesan anda untuk informasi lebih lanjut.</p> --}}
                        </div>
                        {{-- <form action="#" class="cc-form">
                            <div class="group-input">
                                <input type="text" placeholder="Name">
                                <input type="text" placeholder="Email">
                                <input type="text" placeholder="Website">
                            </div>
                            <textarea placeholder="Comment"></textarea>
                            <button type="submit" class="site-btn">Submit</button>
                        </form> --}}
                        <img src="{{ asset('frontend/img/unity.jpg') }}" alt="" class="img-responsive mx-auto d-block my-3" width="150">
                        <h5>Unity Property Batam</h5>
                        <p>Imperium Superblok Blok A No 35, Taman Baloi, Kec. Batam Kota, Kota Batam, Kepulauan Riau 29445</p>
                        <p><a href="wa.me/6281358856556" class="btn btn-sm btn-success">Hubungi Kami</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Form Section End -->
@endsection
