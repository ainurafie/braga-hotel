@extends('layouts.Front.app')

@section('title', __('Braga Hotel'))

@section('content')

    <!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="../assets/img/rooms-bg.jpg">
        <div class="hero-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Rooms</h1>
                    </div>
                </div>
                {{-- <div class="page-nav">
                    <a href="./services.html" class="left-nav"><i class="lnr lnr-arrow-left"></i> Services</a>
                    <a href="./news.html" class="right-nav">News <i class="lnr lnr-arrow-right"></i></a>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Rooms Section Begin -->
    <section class="room-section spad">
        <div class="container">
            @foreach ($rooms as $item)
                <div class="rooms-page-item">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="room-pic-slider owl-carousel">
                                <div class="single-room-pic">
                                    <img src="{{ asset('storage/' . $item->photo) }}" alt="">
                                </div>
                                <div class="single-room-pic">
                                    <img src="../assets/img/room/rooms-2.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="room-text">
                                <div class="room-title">
                                    <h2>{{ $item->name }}</h2>
                                    <div class="room-price">
                                        <span>From</span>
                                        <h2>{{ $item->price }}</h2>
                                        <sub>/night</sub>
                                    </div>
                                </div>
                                <div class="room-desc">
                                    <p>{{ $item->description }}</p>
                                </div>

                                <a href="{{ route('index.check.out', $item->id) }}" class="primary-btn">Book Now <i class="lnr lnr-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
    <!-- Rooms Section End -->
@endsection

@push('css')
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Taviraj:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/front/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/front/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/front/css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="../css/front/css/linearicons.css" type="text/css">
    <link rel="stylesheet" href="../css/front/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/front/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../css/front/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../css/front/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../css/front/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/front/css/style.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/front.css">
@endpush

@push('js')
    <!-- Js Plugins -->
    <script src="../js/front/js/jquery-3.3.1.min.js"></script>
    <script src="../js/front/js/bootstrap.min.js"></script>
    <script src="../js/front/js/jquery.magnific-popup.min.js"></script>
    <script src="../js/front/js/jquery-ui.min.js"></script>
    <script src="../js/front/js/jquery.nice-select.min.js"></script>
    <script src="../js/front/js/jquery.slicknav.js"></script>
    <script src="../js/front/js/owl.carousel.min.js"></script>
    <script src="../js/front/js/main.js"></script>
@endpush
