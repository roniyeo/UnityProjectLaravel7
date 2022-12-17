@extends('layout.frontend')
@section('content')
    <!-- Property Details Section Begin -->
    <section class="property-details-section">
        <div class="property-pic-slider owl-carousel" id="property-pic-slider">
            @foreach ($property->gallery as $gallery)
            <div class="ps-item">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12 p-0">
                                    <div class="ps-item-inner large-item set-bg" data-setbg="{{ Storage::url('property/gallery/' . $gallery->name) }}"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="hs-item set-bg" data-setbg="{{ Storage::url('property/gallery/' . $gallery->name) }}">
            </div> --}}
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="pd-text">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="pd-title">
                                    <div class="label">{{ $property->purpose == 'sale' ? 'For Sale' : 'For Rent' }}</div>
                                    @if ($property->purpose == 'sale')
                                    <div class="pt-price">IDR.
                                        {{ number_format($property->price) }}
                                    </div>
                                    @else
                                        <div class="pt-price">IDR.
                                            {{ number_format($property->price) }}<span> {{ $property->tipe_price == $tipe->id ? $tipe->tipe_price : '' }}</span>
                                        </div>
                                    @endif

                                    <h3>{{ $property->title }}</h3>
                                    <p><span class="icon_pin_alt"></span> {{ $property->address }}</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="pd-social">
                                    <a href="#"><i class="fa fa-mail-forward"></i></a>
                                    <a href="#"><i class="fa fa-send"></i></a>
                                    <a href="#"><i class="fa fa-cloud-download"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="pd-board">
                            <div class="tab-board">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tabs-1"
                                            role="tab">Overview</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Amenities</a>
                                    </li>
                                </ul><!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                        <div class="tab-details">
                                            <ul class="left-table">
                                                <li>
                                                    <span class="type-name">Tipe Rumah</span>
                                                    <span class="type-value">
                                                        @if ($property->type == 'house')
                                                            House
                                                        @elseif ($property->type == 'ruko')
                                                            Ruko
                                                        @elseif ($property->type == 'apartment')
                                                            Apartment
                                                        @else
                                                            Villa
                                                        @endif
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Kode Unity ID</span>
                                                    <span class="type-value">{{ $property->kode }}</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Harga</span>
                                                    @if ($property->purpose == 'sale')
                                                        <span class="type-value">IDR. {{ number_format($property->price) }}</span>
                                                    @else
                                                        <span class="type-value">IDR. {{ number_format($property->price) }} {{ $property->tipe_price == $tipe->id ? $tipe->tipe_price : '' }}</span>
                                                    @endif
                                                </li>
                                                <li>
                                                    <span class="type-name">Kategori</span>
                                                    <span
                                                        class="type-value">{{ $property->purpose == 'rent' ? 'Rent' : 'Sale' }}</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Agent</span>
                                                    <span class="type-value">
                                                        @if ($property->agent == $agent->kode_unity)
                                                            {{ $agent->nama_agent }}
                                                        @else
                                                            Admin Unity Property
                                                        @endif
                                                    </span>
                                                </li>
                                            </ul>
                                            <ul class="right-table">
                                                <li>
                                                    <span class="type-name">Lantai</span>
                                                    <span class="type-value">{{ $property->floor }}</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Kamar Tidur</span>
                                                    <span class="type-value">{{ $property->bedroom }}</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Kamar Mandi</span>
                                                    <span class="type-value">{{ $property->bathroom }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-2" role="tabpanel">
                                        <div class="tab-desc">
                                            {!! $property->description !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-3" role="tabpanel">
                                        <div class="tab-details">
                                            @if ($property->aminities)
                                                <ul class="left-table">
                                                    @foreach ($property->aminities as $item)
                                                        <li>
                                                            <span class="type-value">{{ $item->aminities }}</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                            {{-- <ul class="right-table">
                                                <li>
                                                    <span class="type-name">Home Area</span>
                                                    <span class="type-value">1200 sqft</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Rooms</span>
                                                    <span class="type-value">9</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Bedrooms</span>
                                                    <span class="type-value">4</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Bathrooms</span>
                                                    <span class="type-value">3</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Garages</span>
                                                    <span class="type-value">2</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Parking lots</span>
                                                    <span class="type-value">2</span>
                                                </li>
                                            </ul> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="pd-widget">
                            <h4>Cover Image</h4>
                            <img src="img/property/details/floor-plan.jpg" alt="">
                        </div> --}}
                        <div class="pd-widget">
                            <h4>Maps</h4>
                            <div class="map">
                                {!! $property->maps !!}
                            </div>
                            <div class="map-location">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h6 class="font-weight-bold">Nearby</h6>
                                        <div class="ml-item">
                                            <div class="ml-single-item">
                                                {!! $property->nearby !!}
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-6">
                                        <div class="ml-item">
                                            <div class="ml-single-item">
                                                <h6>Laundry <span>( <i class="fa fa-location-arrow"></i> 3 km )</span></h6>
                                                <p>Besst at laundry</p>
                                            </div>
                                            <div class="ml-single-item">
                                                <h6>Health <span>( <i class="fa fa-location-arrow"></i> 5 km )</span></h6>
                                                <p>Boomerang Barber & Beauty</p>
                                            </div>
                                            <div class="ml-single-item">
                                                <h6>Health <span>( <i class="fa fa-location-arrow"></i> 5 km )</span></h6>
                                                <p>Boomerang Barber & Beauty</p>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="pd-widget">
                            <h4>Agent</h4>
                            <div class="pd-agent">
                                <div class="agent-pic">
                                    @if ($property->agent == $agent->kode_unity)
                                        <img src="{{ asset('agents/' . $agent->foto_agent) }}" alt="">
                                    @else
                                        <img src="{{ asset('frontend/img/unity.jpg') }}" alt="">
                                    @endif
                                </div>
                                <div class="agent-text">
                                    <div class="at-title">
                                        <h6>{{ $property->agent == $agent->kode_unity ? $agent->nama_agent : 'Admin Unity Property' }}
                                        </h6>
                                        <span>Agents</span>
                                        @if ($property->agent == $agent->kode_unity)
                                            <a href="{{ route('agency.show', $agent->kode_unity) }}"
                                                class="primary-btn">View profile</a>
                                        @else
                                            <a href="#" class="primary-btn">View profile</a>
                                        @endif
                                    </div>
                                    <div class="at-option">
                                        <div class="at-number">
                                            {{ $property->agent == $agent->kode_unity ? $agent->nohp : '081358856556' }}
                                        </div>
                                        {{-- <div class="at-social">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-envelope-o"></i></a>
                                        </div> --}}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="property-sidebar">
                        {{-- <div class="single-sidebar">
                            <div class="section-title sidebar-title">
                                <h5>Top agent</h5>
                            </div>
                            <div class="top-agent">
                                <div class="ta-item">
                                    <div class="ta-pic set-bg" data-setbg="img/property/details/sidebar/ta-1.jpg"></div>
                                    <div class="ta-text">
                                        <h6><a href="#">Ashton Kutcher</a></h6>
                                        <span>Team Leader</span>
                                        <div class="ta-num">123-455-688</div>
                                    </div>
                                </div>
                                <div class="ta-item">
                                    <div class="ta-pic set-bg" data-setbg="img/property/details/sidebar/ta-2.jpg"></div>
                                    <div class="ta-text">
                                        <h6><a href="#">Ashton Kutcher</a></h6>
                                        <span>Team Leader</span>
                                        <div class="ta-num">123-455-688</div>
                                    </div>
                                </div>
                                <div class="ta-item">
                                    <div class="ta-pic set-bg" data-setbg="img/property/details/sidebar/ta-3.jpg"></div>
                                    <div class="ta-text">
                                        <h6><a href="#">Ashton Kutcher</a></h6>
                                        <span>Team Leader</span>
                                        <div class="ta-num">123-455-688</div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}  
                        <div class="single-sidebar">
                            <div class="section-title sidebar-title">
                                <h5>Simulasi KPR</h5>
                            </div>
                            @if ($property->purpose == 'sale')
                                <div class="calculator-form">
                                    <div class="filter-input">
                                        <p>Harga Jual</p>
                                        <input type="text" id="harga"
                                            value="{!! number_format($property->price,2,',','.') !!}">
                                    </div>
                                    <div class="filter-input">
                                        <p>Uang Muka (DP %)</p>
                                        <input type="text" id="dp" value="{!! number_format('20',2,',','.') !!}">
                                    </div>
                                    <div class="filter-input">
                                        <p>Bunga % <span style="color: gray">*estimasi rata-rata bunga 8</span></p>
                                        <input type="text" id="bunga" value="{!! number_format('8',2,',','.') !!}" readonly>
                                    </div>
                                    <button class="btn btn-sm btn-success mb-2" id="hitung">Hitung</button>
                                    <div class="filter-input">
                                        <h6 class="font-weight-bold">Hasil Tabel KPR</h6>
                                        <p>DP : IDR. <span id="dpr"></span></p>
                                        <p>KPR : IDR. <span id="kpr"></span></p>
                                        <p>BUNGA : <span id="rate"></span></p>
                                        <p>5th : IDR. <span id="5th"></span></p>
                                        <p>10th : IDR. <span id="10th"></span></p>
                                        <p>15th : IDR. <span id="15th"></span></p>
                                        {{-- <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>DP</th>
                                                    <th>KPR</th>
                                                    <th>BUNGA</th>
                                                    <th>5th</th>
                                                    <th>10th</th>
                                                    <th>15th</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td id="dpr"></td>
                                                    <td id="kpr"></td>
                                                    <td id="rate"></td>
                                                    <td id="5th"></td>
                                                    <td id="10th"></td>
                                                    <td id="15th"></td>
                                                </tr>
                                            </tbody>
                                        </table> --}}
                                    </div>
                                </div>
                            @else
                                <h6>COMING SOON</h6>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Property Details Section End -->

    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.1/jquery.maskMoney.min.js'></script>
    <script>
        function roundToTwo(num) {
            return +(Math.round(num + "e+2") + "e-2");
        }

        function formatNum(out) {
            return Number(out.toFixed(2)).toLocaleString('id');
        }

        function hitungAnu(pv, dp, bunga, lama) {
            var bb = (bunga / 100) / 12;
            var db = lama * 12;
            var pb = (1 + bb) * db;
            return (pv - dp) * ((bb * pb) / (pb - 1));
        }

        function cekParam() {
            var pv = $("#harga").val();
            var dp = $("#dp").val();
            var bunga = $("#bunga").val();
            if (pv == "" || dp == "" || bunga == "")
                return false
            else
                return true
        }

        // function listDetail(pv, dp, bunga, lama) {
        //     var bunga_bulan = (bunga / 100) / 12;
        //     var angsuran = roundToTwo(hitungAnu(pv, dp, bunga, lama));
        //     var sisa = pv - dp;
        //     var bunga_i;
        //     var pokok;
        //     var sd = lama * 12;
        //     var out = '';

        //     for (i = 0; i < sd; i++) {
        //         bunga_i = roundToTwo(bunga_bulan * (sisa));
        //         pokok = roundToTwo(angsuran - bunga_i);
        //         sisa = roundToTwo(sisa - pokok);
        //         out += '<tr><td align="right">' + (i + 1) + '</td><td align="right">' + formatNum(bunga_i) +
        //             '</td><td align="right">' + formatNum(pokok) + '</td><td align="right">' + formatNum(angsuran) +
        //             '</td><td align="right">' + formatNum(sisa) + '</td></tr>';
        //     }
        //     return out;
        // }

        $(function() {
            $("#harga").maskMoney({
                thousands: '.',
                decimal: ',',
                allowZero: false
            });
            $("#dp").maskMoney({
                thousands: '.',
                decimal: ',',
                allowZero: false
            });
            $("#bunga").maskMoney({
                thousands: '.',
                decimal: ',',
                allowZero: false
            });
        });

        $("#hitung").click(function () {
            var pvz = $("#harga").maskMoney('unmasked')[0];
            var dpz = $("#dp").maskMoney('unmasked')[0];
            dpz = ((dpz / 100) * pvz);
            var kpr = pvz - dpz;
            var bungaz = $("#bunga").maskMoney('unmasked')[0];
            console.log(pvz);
            console.log(dpz);
            if (cekParam(pvz, dpz, bungaz)) {
                $("#kpr").empty();
                $("#dpr").empty();
                $("#rate").empty();
                $("#5th").empty();
                $("#10th").empty();
                $("#15th").empty();

                $("#kpr").append(formatNum(kpr));
                $("#rate").append(formatNum(bungaz) + '%');
                $("#dpr").append(formatNum(dpz));

                $("#5th").append(formatNum(hitungAnu(pvz, dpz, bungaz, 5)));
                $("#10th").append(formatNum(hitungAnu(pvz, dpz, bungaz, 10)));
                $("#15th").append(formatNum(hitungAnu(pvz, dpz, bungaz, 15)));
            }
        })

        function simulasiKPR() {
            var pvz = $("#harga").maskMoney('unmasked')[0];
            var dpz = $("#dp").maskMoney('unmasked')[0];
            dpz = ((dpz / 100) * pvz);
            var kpr = pvz - dpz;
            var bungaz = $("#bunga").maskMoney('unmasked')[0];
            console.log(pvz);
            console.log(dpz);
            if (cekParam(pvz, dpz, bungaz)) {
                $("#kpr").empty();
                $("#dpr").empty();
                $("#rate").empty();
                $("#5th").empty();
                $("#10th").empty();
                $("#15th").empty();

                $("#kpr").append(formatNum(kpr));
                $("#rate").append(formatNum(bungaz) + '%');
                $("#dpr").append(formatNum(dpz));

                $("#5th").append(formatNum(hitungAnu(pvz, dpz, bungaz, 5)));
                $("#10th").append(formatNum(hitungAnu(pvz, dpz, bungaz, 10)));
                $("#15th").append(formatNum(hitungAnu(pvz, dpz, bungaz, 15)));
            }
        }
        simulasiKPR();



    </script>
@endsection
