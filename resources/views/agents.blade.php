@extends('layout.frontend')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section spad set-bg" data-setbg="{{ asset('frontend/img/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h4>Our Agents</h4>
                        <div class="bt-option">
                            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                            <span>Agents</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Agent Section Begin -->
    <section class="agent-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="agent-search-form">
                        <form action="#">
                            <input type="text" placeholder="Find agent">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="as-slider owl-carousel">
                <div class="row">
                    @foreach ($agents as $agent)
                        <div class="col-lg-4 col-md-6">
                            <div class="as-item">
                                <div class="as-pic">
                                    <img src="{{ asset('agents/' . $agent->foto_agent) }}" alt="{{ $agent->nama_agent }}">
                                </div>
                                <div class="as-text">
                                    <div class="at-title">
                                        <h6>{{ $agent->nama_agent }}</h6>
                                        <span>Agent</span>
                                    </div>
                                    <ul>
                                        <li>
                                            Property <span>{{ $total }}</span>
                                        </li>
                                        <li>Email <span>{{ $agent->email }}</span></li>
                                        <li>Phone <span>{{ $agent->nohp }}</span></li>
                                    </ul>
                                    <a href="#" class="primary-btn">View profile</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Agent Section End -->
@endsection
