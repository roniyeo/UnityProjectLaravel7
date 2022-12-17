<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" /> --}}
    <style>
        body,
        html {
            min-height: 200vh;
        }

        .carousel-item {
            height: 65vh;
            min-height: 350px;
            background: no-repeat center center scroll;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        /* .swiper {
            width: 85%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .cards {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            border: 1px solid gray;
            transition: 0.3s;
            width: 100%;
            border-radius: 5px;
        }

        .cards:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        img {
            height: 100px;
            border-radius: 5px 5px 0 0;
        }

        .content {
            padding: 2px 16px;
        } */
    </style>
    <title>Document</title>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary bg-opacity-10">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-logo.svg" alt="Logo"
                    width="30" height="24" class="d-inline-block align-text-top">
                Bootstrap
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item active">
                        <a class="nav-link text-dark" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header>

        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active"
                    style="background-image: url('https://www.pkponline.com/admin-pkp/imgbanner/847F41F306A036F03CDA.jpg'); width: 100%; height: 625px;">
                    <div class="carousel-caption">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item"
                    style="background-image: url('https://www.pkponline.com/admin-pkp/imgbanner/35BBDB78B6684FD1EE31.jpg'); width: 100%; height: 625px;">
                    <div class="carousel-caption">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item"
                    style="background-image: url('https://www.pkponline.com/admin-pkp/imgbanner/50E12C27549931B29354.jpg'); width: 100%; height: 625px;">
                    <div class="carousel-caption">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </header>

    {{-- <section class="my-3">
        <div class="container">
            <div class="row">
                <p class="text-center py-2 bg-danger rounded-pill text-white fw-bolder">
                    APARTMENT & RESIDENTIAL
                    <span style="font-size: 12px; float: right; flex: display; align-items: center; margin-top: 3px">15
                        Project</span>
                </p>
            </div>
        </div>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="cards">
                        <img src="https://www.pkponline.com/admin-pkp/imgthumbnail/wonderland.jpg" style="width: 100%">
                        <div class="content">
                            <h4><b>Jane Doe</b></h4> 
                            <p>Interior Designer</p> 
                        </div>
                    </div>

                </div>
                <div class="swiper-slide">
                    <div class="cards">
                        <img src="https://www.pkponline.com/admin-pkp/imgthumbnail/8922D30928B8C65F5A67.jpg" style="width: 100%">
                        <div class="content">
                            <h4><b>Jane Doe</b></h4> 
                            <p>Interior Designer</p> 
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="cards">
                        <img src="https://www.pkponline.com/admin-pkp/imgthumbnail/noblecove.jpg" style="width: 100%">
                        <div class="content">
                            <h4><b>Jane Doe</b></h4> 
                            <p>Interior Designer</p> 
                        </div>
                    </div>

                </div>
                <div class="swiper-slide">
                    <div class="cards">
                        <img src="https://www.pkponline.com/admin-pkp/imgthumbnail/kingselebriti2.jpg" style="width: 100%;">
                        <div class="content">
                            <h4><b>Jane Doe</b></h4> 
                            <p>Interior Designer</p> 
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="cards">
                        <img src="https://www.pkponline.com/admin-pkp/imgthumbnail/dreamland1.jpg" style="width: 100%;">
                        <div class="content">
                            <h4><b>Jane Doe</b></h4> 
                            <p>Interior Designer</p> 
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">Slide 6</div>
                <div class="swiper-slide">Slide 7</div>
                <div class="swiper-slide">Slide 8</div>
                <div class="swiper-slide">Slide 9</div>
                <div class="swiper-slide">Slide 10</div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section> --}}

    <section class="my-3">
        <div class="container">
            <div class="row">
                <p class="text-center py-2 bg-danger rounded-pill text-white fw-bolder">
                    APARTMENT & RESIDENTIAL
                    <span style="font-size: 12px; float: right; flex: display; align-items: center; margin-top: 3px">15
                        Project</span>
                </p>
            </div>
        </div>
        <div class="container">
            <div class="row mb-2">
                <div class="col-lg-2 mb-3">
                    <div class="card h-100">
                        <img src="https://www.pkponline.com/admin-pkp/imgthumbnail/8ED5987B234D5B936C9B.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-title">The Home</p>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus ea omnis placeat.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 mb-3">
                    <div class="card h-100">
                        <img src="https://www.pkponline.com/admin-pkp/imgthumbnail/dreamland2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-title">Dream Land 1</p>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus ea omnis placeat.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 mb-3">
                    <div class="card h-100">
                        <img src="https://www.pkponline.com/admin-pkp/imgthumbnail/kingselebriti2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 mb-3">
                    <div class="card h-100">
                        <img src="https://www.pkponline.com/admin-pkp/imgthumbnail/7231C5BBC8FD752652A7.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 mb-3">
                    <div class="card h-100">
                        <img src="https://www.pkponline.com/admin-pkp/imgthumbnail/946B8FA03ACB256DB674.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">The Home</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 mb-3">
                    <div class="card h-100">
                        <img src="https://www.pkponline.com/admin-pkp/imgthumbnail/dreamland1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 mb-3">
                    <div class="card h-100">
                        <img src="https://www.pkponline.com/admin-pkp/imgthumbnail/dreamland1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="my-3">
        <div class="container">
            <div class="row">
                <p class="text-center py-2 bg-danger rounded-pill text-white fw-bolder">
                    COMMERCIAL
                    <span style="font-size: 12px; float: right; flex: display; align-items: center; margin-top: 3px">15
                        Project</span>
                </p>
            </div>
        </div>
        <div class="container">
            <div class="row mb-2">
                <div class="col-lg-2 mb-3">
                    <a href="#" class="text-decoration-none text-dark">
                        <div class="card h-100">
                            <img src="https://www.pkponline.com/admin-pkp/imgthumbnail/DDCF10B5FA70C3FD58A6.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">The Home</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 mb-3">
                    <div class="card h-100">
                        <img src="https://www.pkponline.com/admin-pkp/imgthumbnail/dreamland2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Dream Land 1</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 mb-3">
                    <div class="card h-100">
                        <img src="https://www.pkponline.com/admin-pkp/imgthumbnail/kingselebriti2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 mb-3">
                    <div class="card h-100">
                        <img src="https://www.pkponline.com/admin-pkp/imgthumbnail/7231C5BBC8FD752652A7.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 mb-3">
                    <div class="card h-100">
                        <img src="https://www.pkponline.com/admin-pkp/imgthumbnail/946B8FA03ACB256DB674.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">The Home</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 mb-3">
                    <div class="card h-100">
                        <img src="https://www.pkponline.com/admin-pkp/imgthumbnail/dreamland1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 mb-3">
                    <div class="card h-100">
                        <img src="https://www.pkponline.com/admin-pkp/imgthumbnail/dreamland1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script>
        var swiper = new Swiper(".mySwiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            slidesPerView: 5,
            slidesPerGroup: 5,
            spaceBetween: 10,
        });
    </script> --}}
</body>

</html>
