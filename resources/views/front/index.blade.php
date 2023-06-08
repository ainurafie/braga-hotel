@extends('layouts.Front.app')

@section('title', __('Braga Hotel'))

@section('content')
    <!-- home -->

    <section class="home" id="home">

        <div class="swiper home-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide" style="background: url(../assets/images/home-slide1.jpg) no-repeat;">
                    <div class="content">
                        <h3>it's where dreams come true</h3>
                        <a href="#" class="btn"> visit our offer</a>
                    </div>
                </div>

                <div class="swiper-slide slide" style="background: url(../assets/images/home-slide2.jpg) no-repeat;">
                    <div class="content">
                        <h3>it's where dreams come true</h3>
                        <a href="#" class="btn"> visit our offer</a>
                    </div>
                </div>

                <div class="swiper-slide slide" style="background: url(../assets/images/home-slide3.jpg) no-repeat;">
                    <div class="content">
                        <h3>it's where dreams come true</h3>
                        <a href="#" class="btn"> visit our offer</a>
                    </div>
                </div>

                <div class="swiper-slide slide" style="background: url(../assets/images/home-slide4.jpg) no-repeat;">
                    <div class="content">
                        <h3>it's where dreams come true</h3>
                        <a href="#" class="btn"> visit our offer</a>
                    </div>
                </div>

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

    </section>

    <!-- end -->

    <!-- availability -->

    <section class="availability">

        <form action="">

            <div class="box">
                <p>check in <span>*</span></p>
                <input type="date" class="input">
            </div>

            <div class="box">
                <p>check out <span>*</span></p>
                <input type="date" class="input">
            </div>

            <div class="box">
                <p>adults <span>*</span></p>
                <select name="adults" id="" class="input">
                    <option value="1">1 adults</option>
                    <option value="2">2 adults</option>
                    <option value="3">3 adults</option>
                    <option value="4">4 adults</option>
                    <option value="5">5 adults</option>
                    <option value="6">6 adults</option>
                </select>
            </div>

            <div class="box">
                <p>children <span>*</span></p>
                <select name="child" id="" class="input">
                    <option value="1">1 child</option>
                    <option value="2">2 child</option>
                    <option value="3">3 child</option>
                    <option value="4">4 child</option>
                    <option value="5">5 child</option>
                    <option value="6">6 child</option>
                </select>
            </div>

            <div class="box">
                <p>rooms <span>*</span></p>
                <select name="rooms" id="" class="input">
                    <option value="1">1 rooms</option>
                    <option value="2">2 rooms</option>
                    <option value="3">3 rooms</option>
                    <option value="4">4 rooms</option>
                    <option value="5">5 rooms</option>
                    <option value="6">6 rooms</option>
                </select>
            </div>

            <input type="submit" value="check availability" class="btn">

        </form>

    </section>

    <!-- end -->


    <!-- about -->

    <section class="about" id="about">

        <div class="row">

            <div class="image">
                <img src="../assets/images/about.jpg" alt="">
            </div>

            <div class="content">
                <h3>about us</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione nesciunt blanditiis maxime natus
                    repudiandae veritatis alias laboriosam neque cum! Est adipisci assumenda, ad debitis iusto laudantium
                    repellat aliquam dolore voluptates.</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione nesciunt blanditiis maxime natus
                    repudiandae veritatis alias laboriosam neque cum! Est adipisci assumenda, ad debitis iusto laudantium
                    repellat aliquam dolore voluptates.</p>
            </div>

        </div>

    </section>

    <!-- end -->

    <!-- room -->

    <section class="room" id="room">

        <h1 class="heading">our room</h1>

        <div class="swiper room-slider">
            <div class="swiper-wrapper">
                @foreach ($room as $item)
                    <div class="swiper-slide slide">
                        <div class="image">
                            <span class="price">{{ $item->price }}</span>
                            <img src="{{ asset('storage/' . $item->photo) }}" alt="">
                        </div>
                        <div class="content">
                            <h3>{{ $item->name }}</h3>
                            <p>{{ $item->description }}</p>
                            <a href="#" class="btn">book now</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>

        </div>

    </section>

    <!-- end -->

    <!-- services -->

    <section class="services">

        <div class="box-container">

            <div class="box">
                <img src="../assets/images/service1.png" alt="">
                <h3>swimming pool</h3>
            </div>

            <div class="box">
                <img src="../assets/images/service2.png" alt="">
                <h3>food & drink</h3>
            </div>

            <div class="box">
                <img src="../assets/images/service3.png" alt="">
                <h3>restaurant</h3>
            </div>

            <div class="box">
                <img src="../assets/images/service4.png" alt="">
                <h3>fitness</h3>
            </div>

            <div class="box">
                <img src="../assets/images/service5.png" alt="">
                <h3>beauty spa</h3>
            </div>

            <div class="box">
                <img src="../assets/images/service6.png" alt="">
                <h3>resort beach</h3>
            </div>

        </div>

    </section>

    <!-- end -->

    <!-- gallery -->

    <section class="gallery" id="gallery">

        <h1 class="heading">our gallery</h1>

        <div class="swiper gallery-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide">
                    <img src="../assets/images/gallery1.jpg" alt="">
                    <div class="icon">
                        <i class="fas fa-magnifying-glass-plus"></i>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <img src="../assets/images/gallery2.jpg" alt="">
                    <div class="icon">
                        <i class="fas fa-magnifying-glass-plus"></i>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <img src="../assets/images/gallery3.jpg" alt="">
                    <div class="icon">
                        <i class="fas fa-magnifying-glass-plus"></i>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <img src="../assets/images/gallery4.jpg" alt="">
                    <div class="icon">
                        <i class="fas fa-magnifying-glass-plus"></i>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <img src="../assets/images/gallery5.jpg" alt="">
                    <div class="icon">
                        <i class="fas fa-magnifying-glass-plus"></i>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <img src="../assets/images/gallery6.jpg" alt="">
                    <div class="icon">
                        <i class="fas fa-magnifying-glass-plus"></i>
                    </div>
                </div>

            </div>

        </div>

    </section>

    <!-- end -->




    <!-- reservation -->

    <section class="reservation" id="reservation">

        <h1 class="heading">book now</h1>

        <form action="">

            <div class="container">

                <div class="box">
                    <p>name <span>*</span></p>
                    <input type="text" class="input" placeholder="Your Name">
                </div>

                <div class="box">
                    <p>email <span>*</span></p>
                    <input type="text" class="input" placeholder="Your Email">
                </div>

                <div class="box">
                    <p>check in <span>*</span></p>
                    <input type="date" class="input">
                </div>

                <div class="box">
                    <p>check out <span>*</span></p>
                    <input type="date" class="input">
                </div>

                <div class="box">
                    <p>Duration <span>*</span></p>
                    <input type="text" class="input" disabled>
                </div>

                <div class="box">
                    <p>adults <span>*</span></p>
                    <select name="adults" class="input">
                        <option value="1">1 adults</option>
                        <option value="2">2 adults</option>
                        <option value="3">3 adults</option>
                        <option value="4">4 adults</option>
                        <option value="5">5 adults</option>
                        <option value="6">6 adults</option>
                    </select>
                </div>

                <div class="box">
                    <p>room type <span>*</span></p>
                    <select name="type" class="input">
                        <option value="1">exclusive rooms</option>
                        <option value="2">family rooms</option>
                        <option value="3">daily rooms</option>
                        <option value="4">panoramic rooms</option>
                    </select>
                </div>
                <div class="box">

                </div>

            </div>

            <input type="submit" value="check availability" class="btn">

        </form>

    </section>
    <section>
        <h1 class="heading">Event</h1>
        <div class="flex gap-8 items-center">
            <div class="w-1/2">
                <h1 class="text-[64px] text-blue-500 font-semibold  ">"Music</h1>
                <h1 class="text-[48px] text-blue-500 font-medium mb-5">heals<br> everything.”</h1>
                <h1 class="text-[32px] text-blue-500 font-medium">While enjoying music, you can capture the moment. You won't miss a single moment with us”</h1>
                <button class="btn mt-20">Join Now</button>
            </div>
            <div class="">
                <img src="../assets/images/gallery1.jpg" alt="" class="w-[300px] h-[300px] rounded-xl mb-10">
                <img src="../assets/images/gallery1.jpg" alt="" class="w-[300px] h-[300px] rounded-xl">
            </div>
            <div class="">
                <img src="../assets/images/gallery1.jpg" alt="" class="w-[300px] h-[300px] rounded-xl mb-10">
                <img src="../assets/images/gallery1.jpg" alt="" class="w-[300px] h-[300px] rounded-xl">
            </div>
        </div>
    </section>
    <!-- end -->
@endsection
