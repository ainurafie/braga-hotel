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

        <form action="{{ route('index.check.room') }}" method="GET">

            <div class="box flex flex-col items-center">
                <p>check in <span>*</span></p>
                <input type="date" class="input" name="start_date">
            </div>

            <div class="box flex flex-col items-center">
                <p>check out <span>*</span></p>
                <input type="date" class="input" name="end_date">
            </div>

            <div class="box flex flex-col items-center">
                <p>capacity <span>*</span></p>
                <select name="capacity" id="" class="input">
                    <option value="1">1 person</option>
                    <option value="2">2 person</option>
                    <option value="3">3 person</option>
                    <option value="4">4 person</option>
                    <option value="5">5 person</option>
                    <option value="6">6 person</option>
                    <option value="7">7 person</option>
                    <option value="8">8 person</option>
                </select>
            </div>

            <div class="box flex flex-col items-center">
                <p>rooms <span>*</span></p>
                <select name="category_id" id="" class="input">
                    <option value="">Pilih Kategori</option>
                    @foreach ($category as $itemCategory)
                        <option value="{{ $itemCategory->id }}" @if (isset($item->category_id) && $item->category_id == $itemCategory->id) selected @endif>
                            {{ $itemCategory->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit">Check Avalibility</button>
        </form>

    </section>

    <!-- end -->


    <!-- about -->

    <section class="about" id="about">

        <div class="row">

            <div class="image">
                <img src="../assets/images/about.jpeg" alt="">
            </div>

            <div class="content">
                <h3>about us</h3>
                <p>Where your comfort is our main concern.
                    You can enjoy the luxury of from star hotels in the best locations throughout Purwokerto.
                    Braga Hotel Purwokerto is a Three Star developed by the PT Bintang Surya Pratama. Suitable for business,
                    leisure and important events for you, your family and colleagues.
                    We await your return.</p>

            </div>

        </div>

    </section>

    <!-- end -->

    <!-- room -->

    <section class="room" id="room">

        <h1 class="heading">our room</h1>

        <div class="">
            <div class="w-full flex gap-10 overflow-x-auto">
                @foreach ($room as $item)
                    <div class="swiper-slide slide w-[400px]">
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

        <div class="box-container mb-20">

            <div class="box flex flex-col items-center">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15.875 38.375L10.625 33C13.0833 30.5417 15.9692 28.5942 19.2825 27.1575C22.5942 25.7192 26.1667 25 30 25C33.8333 25 37.4067 25.7292 40.72 27.1875C44.0317 28.6458 46.9167 30.625 49.375 33.125L44.125 38.375C42.2917 36.5417 40.1667 35.1042 37.75 34.0625C35.3333 33.0208 32.75 32.5 30 32.5C27.25 32.5 24.6667 33.0208 22.25 34.0625C19.8333 35.1042 17.7083 36.5417 15.875 38.375ZM5.25 27.75L0 22.5C3.83333 18.5833 8.3125 15.5208 13.4375 13.3125C18.5625 11.1042 24.0833 10 30 10C35.9167 10 41.4375 11.1042 46.5625 13.3125C51.6875 15.5208 56.1667 18.5833 60 22.5L54.75 27.75C51.5417 24.5417 47.8233 22.0308 43.595 20.2175C39.365 18.4058 34.8333 17.5 30 17.5C25.1667 17.5 20.635 18.4058 16.405 20.2175C12.1767 22.0308 8.45833 24.5417 5.25 27.75ZM30 52.5L38.8125 43.625C37.6875 42.5 36.375 41.6142 34.875 40.9675C33.375 40.3225 31.75 40 30 40C28.25 40 26.625 40.3225 25.125 40.9675C23.625 41.6142 22.3125 42.5 21.1875 43.625L30 52.5Z"
                        fill="#0077B6" />
                </svg>
                <h1 class="text-[30px] font-medium mb-[14px]">Fast Wifi</h1>
                <h1 class="text-[16px]">Secure, high-speed internet available.</h1>
            </div>

            <div class="box flex flex-col items-center">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_11_5481)">
                        <path
                            d="M11.5386 0C11.5386 0 6.99479 5.00538 6.99479 7.5C6.99577 8.61288 7.40909 9.68593 8.15494 10.5119C8.90078 11.3379 9.92623 11.8582 11.0332 11.9723C10.5031 11.8619 10.0273 11.5721 9.68595 11.1517C9.34461 10.7313 9.15864 10.2061 9.1594 9.66462C9.1594 8.36539 11.5386 5.76923 11.5386 5.76923C11.5386 5.76923 13.9179 8.36308 13.9179 9.66462C13.9179 10.8023 13.1148 11.7531 12.044 11.9723C13.151 11.8582 14.1765 11.3379 14.9223 10.5119C15.6682 9.68593 16.0815 8.61288 16.0825 7.5C16.0825 5.00769 11.5386 0 11.5386 0ZM30.0002 0C30.0002 0 25.4563 5.00538 25.4563 7.5C25.4573 8.61288 25.8706 9.68593 26.6165 10.5119C27.3623 11.3379 28.3878 11.8582 29.4948 11.9723C28.9647 11.8619 28.4888 11.5721 28.1475 11.1517C27.8061 10.7313 27.6202 10.2061 27.6209 9.66462C27.6209 8.36539 30.0002 5.76923 30.0002 5.76923C30.0002 5.76923 32.3794 8.36308 32.3794 9.66462C32.3794 10.8023 31.5763 11.7531 30.5056 11.9723C31.6126 11.8582 32.638 11.3379 33.3839 10.5119C34.1297 9.68593 34.543 8.61288 34.544 7.5C34.544 5.00769 30.0002 0 30.0002 0ZM48.4617 0C48.4617 0 43.9179 5.00538 43.9179 7.5C43.9188 8.61288 44.3322 9.68593 45.078 10.5119C45.8239 11.3379 46.8493 11.8582 47.9563 11.9723C47.4262 11.8619 46.9504 11.5721 46.609 11.1517C46.2677 10.7313 46.0817 10.2061 46.0825 9.66462C46.0825 8.36539 48.4617 5.76923 48.4617 5.76923C48.4617 5.76923 50.8409 8.36308 50.8409 9.66462C50.8409 10.8023 50.0379 11.7531 48.9671 11.9723C50.0741 11.8582 51.0996 11.3379 51.8454 10.5119C52.5913 9.68593 53.0046 8.61288 53.0056 7.5C53.0056 5.00769 48.4617 0 48.4617 0ZM6.99479 13.1262C6.80701 13.0926 6.61412 13.1012 6.43007 13.1513C6.24601 13.2014 6.07539 13.2918 5.93053 13.4159C5.78567 13.54 5.67019 13.6947 5.59243 13.8689C5.51468 14.0431 5.4766 14.2324 5.48094 14.4231C5.48094 15.2538 6.99479 16.7562 6.99479 19.3985V32.2362H16.0848V19.1838C16.0848 17.5708 17.5986 16.9869 17.5986 16.1538C17.5986 15.3231 17.564 14.4231 15.0025 14.4231C11.1925 14.4231 6.99709 13.1238 6.99709 13.1238L6.99479 13.1262ZM25.4563 13.1262C25.2685 13.0926 25.0757 13.1012 24.8916 13.1513C24.7076 13.2014 24.5369 13.2918 24.3921 13.4159C24.2472 13.54 24.1317 13.6947 24.054 13.8689C23.9762 14.0431 23.9381 14.2324 23.9425 14.4231C23.9425 15.2538 25.4563 16.7562 25.4563 19.3985V32.2362H34.544V19.1838C34.544 17.5708 36.0579 16.9869 36.0579 16.1538C36.0579 15.3231 36.0233 14.4231 33.4617 14.4231C29.6517 14.4231 25.4563 13.1238 25.4563 13.1238V13.1262ZM43.9179 13.1262C43.7301 13.0926 43.5372 13.1012 43.3531 13.1513C43.1691 13.2014 42.9985 13.2918 42.8536 13.4159C42.7087 13.54 42.5933 13.6947 42.5155 13.8689C42.4378 14.0431 42.3997 14.2324 42.404 14.4231C42.404 15.2538 43.9179 16.7562 43.9179 19.3985V32.2362H53.0056V19.1838C53.0056 17.5708 54.5194 16.9869 54.5194 16.1538C54.5194 15.3231 54.4848 14.4231 51.9232 14.4231C48.1132 14.4231 43.9179 13.1238 43.9179 13.1238V13.1262ZM9.23094 34.6154C5.4094 34.6154 2.30786 37.7169 2.30786 41.5385V55.3846C2.2356 55.3812 2.16321 55.3812 2.09094 55.3846C1.78789 55.3989 1.49061 55.4727 1.21608 55.6018C0.94155 55.7309 0.695141 55.9129 0.490924 56.1372C0.0784879 56.5903 -0.137056 57.1887 -0.10829 57.8008C-0.0795241 58.4128 0.191195 58.9883 0.644311 59.4008C1.09743 59.8132 1.69583 60.0288 2.30786 60H57.6925C58.3045 60 58.8915 59.7569 59.3243 59.3241C59.757 58.8913 60.0002 58.3043 60.0002 57.6923C60.0002 57.0803 59.757 56.4933 59.3243 56.0605C58.8915 55.6277 58.3045 55.3846 57.6925 55.3846V41.5385C57.6925 37.7169 54.5909 34.6154 50.7694 34.6154H9.23094ZM11.5386 43.8462C11.5386 45.0702 12.0249 46.2442 12.8904 47.1097C13.756 47.9753 14.9299 48.4615 16.154 48.4615C17.3781 48.4615 18.552 47.9753 19.4176 47.1097C20.2831 46.2442 20.7694 45.0702 20.7694 43.8462C20.7694 45.0702 21.2557 46.2442 22.1212 47.1097C22.9868 47.9753 24.1607 48.4615 25.3848 48.4615C26.6089 48.4615 27.7828 47.9753 28.6484 47.1097C29.5139 46.2442 30.0002 45.0702 30.0002 43.8462C30.0002 45.0702 30.4864 46.2442 31.352 47.1097C32.2175 47.9753 33.3915 48.4615 34.6156 48.4615C35.8396 48.4615 37.0136 47.9753 37.8791 47.1097C38.7447 46.2442 39.2309 45.0702 39.2309 43.8462C39.2309 45.0702 39.7172 46.2442 40.5828 47.1097C41.4483 47.9753 42.6222 48.4615 43.8463 48.4615C45.0704 48.4615 46.2443 47.9753 47.1099 47.1097C47.9754 46.2442 48.4617 45.0702 48.4617 43.8462C48.4617 45.0702 48.948 46.2442 49.8135 47.1097C50.6791 47.9753 51.853 48.4615 53.0771 48.4615V55.3846H6.92325V48.4615C8.14732 48.4615 9.32127 47.9753 10.1868 47.1097C11.0524 46.2442 11.5386 45.0702 11.5386 43.8462Z"
                            fill="#0077B6" />
                    </g>
                    <defs>
                        <clipPath id="clip0_11_5481">
                            <rect width="60" height="60" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
                <h1 class="text-[30px] font-medium mb-[14px]">Birthday Package</h1>
                <h1 class="text-[16px]">Celebrate your special day at
                    Braga Hotel and have the happiest
                    birthday party with us!</h1>
            </div>

            <div class="box flex flex-col items-center">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6.73719 5.59473L49.9126 48.7701C50.7318 49.5894 51.192 50.7006 51.192 51.8592C51.192 53.0178 50.7318 54.129 49.9126 54.9482C49.0931 55.7672 47.982 56.2272 46.8235 56.2272C45.665 56.2272 44.5539 55.7672 43.7345 54.9482L33.1876 44.2197C32.4974 43.5189 32.1102 42.5749 32.1095 41.5912V40.9432C32.1095 40.4465 32.011 39.9547 31.8195 39.4965C31.6279 39.0382 31.3473 38.6225 30.9938 38.2736L29.6321 37.0162C29.1698 36.5897 28.6077 36.2863 27.9975 36.1339C27.3872 35.9815 26.7484 35.9851 26.1399 36.1443C25.1804 36.3948 24.172 36.3899 23.2149 36.1303C22.2577 35.8707 21.3851 35.3653 20.6837 34.6643L10.6723 24.6518C4.73328 18.7127 2.54773 9.74434 6.73719 5.59473Z"
                        stroke="#0077B6" stroke-width="4" stroke-linejoin="round" />
                    <path
                        d="M46.875 3.75L37.8222 12.8027C37.1256 13.4992 36.573 14.3261 36.196 15.2361C35.819 16.1462 35.625 17.1216 35.625 18.1066V19.848C35.625 20.0944 35.5765 20.3384 35.4822 20.566C35.3879 20.7936 35.2496 21.0004 35.0754 21.1746L33.75 22.5M37.5 26.25L38.8254 24.9246C38.9995 24.7503 39.2063 24.6121 39.434 24.5178C39.6616 24.4235 39.9055 24.375 40.1519 24.375H41.8933C42.8784 24.375 43.8538 24.181 44.7639 23.804C45.6739 23.4269 46.5008 22.8743 47.1972 22.1777L56.25 13.125M51.5625 8.4375L42.1875 17.8125M23.4375 43.125L11.7515 54.8766C10.8725 55.7553 9.68043 56.249 8.43748 56.249C7.19452 56.249 6.00245 55.7553 5.12341 54.8766V54.8766C4.24464 53.9975 3.75098 52.8055 3.75098 51.5625C3.75098 50.3195 4.24464 49.1275 5.12341 48.2484L15 38.4375"
                        stroke="#0077B6" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <h1 class="text-[30px] font-medium mb-[14px]">Restaurant</h1>
                <h1 class="text-[16px]">Suitable for culinary lovers with a
                    variety of Nusantara and International
                    menus</h1>
            </div>
        </div>
        <div class="box-container">
            <div class="box flex flex-col items-center">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M48.4 11.8077C46.7665 10.1551 44.6867 9.01456 42.4151 8.52552C40.1435 8.03648 37.7787 8.2202 35.6099 9.05419C33.4411 9.88818 31.5624 11.3363 30.2037 13.2213C28.8451 15.1063 28.0653 17.3465 27.96 19.6677L40.528 32.2357C42.8477 32.1304 45.0866 31.3515 46.9709 29.9944C48.8552 28.6372 50.3033 26.7606 51.1383 24.5937C51.9733 22.4269 52.159 20.0637 51.6727 17.793C51.1864 15.5224 50.0492 13.4425 48.4 11.8077ZM18.688 33.0077L10.2 41.5077C9.45007 42.2578 9.02881 43.2751 9.02881 44.3357C9.02881 45.3964 9.45007 46.4136 10.2 47.1637L13.028 49.9917C13.7781 50.7416 14.7953 51.1629 15.856 51.1629C16.9166 51.1629 17.9338 50.7416 18.684 49.9917L27.168 41.5077L35.656 33.0197L27.172 24.5357L18.688 33.0077ZM21.652 41.3557L18.824 38.5277L27.172 30.1917L30 33.0197L21.652 41.3557Z"
                        fill="#0077B6" />
                </svg>

                <h1 class="text-[30px] font-medium mb-[14px]">Karaoke</h1>
                <h1 class="text-[16px]">Perfect for singing</h1>
            </div>

            <div class="box flex flex-col items-center">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M41.25 17.3438C40.7422 17.3438 40.3027 17.1582 39.9316 16.7871C39.5605 16.416 39.375 15.9766 39.375 15.4688C39.375 14.4727 39.5605 13.5156 39.9316 12.5977C40.3027 11.6797 40.8496 10.8691 41.5723 10.166L43.8867 7.82227C44.6289 7.08008 45 6.19141 45 5.15625C45 4.64844 45.1855 4.20898 45.5566 3.83789C45.9277 3.4668 46.3672 3.28125 46.875 3.28125C47.3828 3.28125 47.8223 3.4668 48.1934 3.83789C48.5645 4.20898 48.75 4.64844 48.75 5.15625C48.75 6.15234 48.5645 7.10938 48.1934 8.02734C47.8223 8.94531 47.2754 9.75586 46.5527 10.459L44.2383 12.8027C43.4961 13.5449 43.125 14.4336 43.125 15.4688C43.125 15.9766 42.9395 16.416 42.5684 16.7871C42.1973 17.1582 41.7578 17.3438 41.25 17.3438ZM30 17.3438C29.4922 17.3438 29.0527 17.1582 28.6816 16.7871C28.3105 16.416 28.125 15.9766 28.125 15.4688C28.125 14.4727 28.3105 13.5156 28.6816 12.5977C29.0527 11.6797 29.5996 10.8691 30.3223 10.166L32.6367 7.82227C33.3789 7.08008 33.75 6.19141 33.75 5.15625C33.75 4.64844 33.9355 4.20898 34.3066 3.83789C34.6777 3.4668 35.1172 3.28125 35.625 3.28125C36.1328 3.28125 36.5723 3.4668 36.9434 3.83789C37.3145 4.20898 37.5 4.64844 37.5 5.15625C37.5 6.15234 37.3145 7.10938 36.9434 8.02734C36.5723 8.94531 36.0254 9.75586 35.3027 10.459L32.9883 12.8027C32.2461 13.5449 31.875 14.4336 31.875 15.4688C31.875 15.9766 31.6895 16.416 31.3184 16.7871C30.9473 17.1582 30.5078 17.3438 30 17.3438ZM54.375 22.5C55.1562 22.5 55.8887 22.6465 56.5723 22.9395C57.2559 23.2324 57.8516 23.6328 58.3594 24.1406C58.8672 24.6484 59.2676 25.2441 59.5605 25.9277C59.8535 26.6113 60 27.3438 60 28.125V39.375C60 40.1562 59.8535 40.8887 59.5605 41.5723C59.2676 42.2559 58.8672 42.8516 58.3594 43.3594C57.8516 43.8672 57.2559 44.2676 56.5723 44.5605C55.8887 44.8535 55.1562 45 54.375 45H52.7051C52.666 45.1367 52.6367 45.2637 52.6172 45.3809C52.5977 45.498 52.5586 45.6152 52.5 45.7324V46.875C52.5 48.1641 52.2559 49.375 51.7676 50.5078C51.2793 51.6406 50.6055 52.6367 49.7461 53.4961C48.8867 54.3555 47.8906 55.0293 46.7578 55.5176C45.625 56.0059 44.4141 56.25 43.125 56.25H31.875C30.3516 56.25 28.9453 55.9082 27.6562 55.2246C26.3672 54.541 25.293 53.6328 24.4336 52.5H9.78516C8.49609 52.5 7.28516 52.2559 6.15234 51.7676C5.01953 51.2793 4.02344 50.6152 3.16406 49.7754C2.30469 48.9355 1.63086 47.9395 1.14258 46.7871C0.654297 45.6348 0.410156 44.4141 0.410156 43.125V41.25H7.91016C7.91016 39.707 8.20312 38.252 8.78906 36.8848C9.375 35.5176 10.1855 34.3262 11.2207 33.3105C12.2559 32.2949 13.4473 31.4844 14.7949 30.8789C16.1426 30.2734 17.5977 29.9805 19.1602 30C19.7461 30 20.3125 30.0488 20.8594 30.1465C21.4062 30.2441 21.9531 30.3809 22.5 30.5566V18.75H52.5V22.5H54.375ZM19.1602 33.75C18.125 33.75 17.1582 33.9453 16.2598 34.3359C15.3613 34.7266 14.5605 35.2637 13.8574 35.9473C13.1543 36.6309 12.6172 37.4219 12.2461 38.3203C11.875 39.2188 11.6797 40.1953 11.6602 41.25H22.5V34.5703C21.9922 34.3164 21.4648 34.1211 20.918 33.9844C20.3711 33.8477 19.7852 33.7695 19.1602 33.75ZM9.78516 48.75H22.7051C22.5684 48.1836 22.5 47.5586 22.5 46.875V45H4.48242C4.67773 45.5469 4.95117 46.0449 5.30273 46.4941C5.6543 46.9434 6.05469 47.3438 6.50391 47.6953C6.95312 48.0469 7.46094 48.3008 8.02734 48.457C8.59375 48.6133 9.17969 48.7109 9.78516 48.75ZM23.3496 50.7129V50.7422L23.3789 50.8008V50.7715L23.3496 50.7129ZM48.75 46.875V22.5H26.25V46.875C26.25 47.6562 26.3965 48.3887 26.6895 49.0723C26.9824 49.7559 27.3828 50.3516 27.8906 50.8594C28.3984 51.3672 28.9941 51.7676 29.6777 52.0605C30.3613 52.3535 31.0938 52.5 31.875 52.5H43.125C43.9062 52.5 44.6387 52.3535 45.3223 52.0605C46.0059 51.7676 46.6016 51.3672 47.1094 50.8594C47.6172 50.3516 48.0176 49.7559 48.3105 49.0723C48.6035 48.3887 48.75 47.6562 48.75 46.875ZM56.25 39.375V28.125C56.25 27.6172 56.0645 27.1777 55.6934 26.8066C55.3223 26.4355 54.8828 26.25 54.375 26.25H52.5V41.25H54.375C54.8828 41.25 55.3223 41.0645 55.6934 40.6934C56.0645 40.3223 56.25 39.8828 56.25 39.375Z"
                        fill="#0077B6" />
                </svg>
                <h1 class="text-[30px] font-medium mb-[14px]">Breakfast</h1>
                <h1 class="text-[16px]">All happiness depends on a
                    leisurely breakfast.</h1>
            </div>

            <div class="box flex flex-col items-center">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M56.4002 10.7998H38.4002C38.4002 10.7998 37.2002 20.3998 39.6002 29.9998C40.565 31.6078 42.9482 32.4742 45.6002 32.6938V44.3998H45.2006L40.8002 47.9998H54.0002L49.6994 44.3998H49.2002V32.6062C51.7442 32.2762 54.0758 31.3894 55.2002 29.9998C57.6002 21.5998 56.4002 10.7998 56.4002 10.7998ZM55.2002 17.9998H39.6002V11.9998H55.2002V17.9998ZM25.8002 44.3998H19.2002V34.1998L32.4002 14.3998H1.2002L14.4002 34.1998V44.3998H7.8002C7.32281 44.3998 6.86497 44.5894 6.5274 44.927C6.18984 45.2646 6.0002 45.7224 6.0002 46.1998C6.0002 46.6772 6.18984 47.135 6.5274 47.4726C6.86497 47.8102 7.32281 47.9998 7.8002 47.9998H25.8002C26.2776 47.9998 26.7354 47.8102 27.073 47.4726C27.4106 47.135 27.6002 46.6772 27.6002 46.1998C27.6002 45.7224 27.4106 45.2646 27.073 44.927C26.7354 44.5894 26.2776 44.3998 25.8002 44.3998Z"
                        fill="#0077B6" />
                </svg>
                <h1 class="text-[30px] font-medium mb-[14px]">Club</h1>
                <h1 class="text-[16px]">Life is good. Party life
                    makes it better!.</h1>
            </div>
            <div class="box flex flex-col items-center">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M30 7.5C17.5 7.5 7.5 17.5 7.5 30C7.5 42.5 17.5 52.5 30 52.5C42.5 52.5 52.5 42.5 52.5 30C52.5 17.5 42.5 7.5 30 7.5ZM30 47.5C20.25 47.5 12.5 39.75 12.5 30C12.5 20.25 20.25 12.5 30 12.5C39.75 12.5 47.5 20.25 47.5 30C47.5 39.75 39.75 47.5 30 47.5ZM51.25 51.25C56.75 45.75 60 38.25 60 30C60 21.75 56.75 14.25 51.25 8.75L48.5 11.5C53.25 16.25 56.25 22.75 56.25 30C56.25 37.25 53.25 43.75 48.5 48.5L51.25 51.25ZM11.5 48.5C6.75 43.75 3.75 37.25 3.75 30C3.75 22.75 6.75 16.25 11.5 11.5L8.75 8.75C3.25 14.25 0 21.75 0 30C0 38.25 3.25 45.75 8.75 51.25L11.5 48.5ZM23.75 17.5V42.5H28.75V32.5H33.75C35.0761 32.5 36.3479 31.9732 37.2855 31.0355C38.2232 30.0979 38.75 28.8261 38.75 27.5V22.5C38.75 21.1739 38.2232 19.9021 37.2855 18.9645C36.3479 18.0268 35.0761 17.5 33.75 17.5H23.75ZM28.75 22.5H33.75V27.5H28.75V22.5Z"
                        fill="#0077B6" />
                </svg>

                <h1 class="text-[30px] font-medium mb-[14px]">Parking Area</h1>
                <h1 class="text-[16px]">Don't worry about not being able to park your vehicle</h1>
            </div>

        </div>

    </section>

    <!-- end -->

    <!-- gallery -->

    {{-- <section class="gallery" id="gallery">

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

    </section> --}}

    <!-- end -->





    <section>
        <h1 class="heading">Event</h1>
        <div class="flex gap-8 items-center">
            @foreach ($event as $item)
                <div class="w-1/2">

                    <h1 class="text-[30px] text-blue-500 font-semibold">{{ $item->title }}</h1>
                    <h1 class="text-[16px] text-blue-500 font-medium mb-5">{{ $item->date }}</h1>
                    <h1 class="text-[16px] text-blue-500 font-medium">{{ $item->description }}</h1>
                    {{-- <button class="btn mt-20">Join Now</button> --}}
                </div>
                <div class="">
                    <img src="{{ asset('storage/' . $item->photo) }}" alt=""
                        class="w-[300px] h-[300px] rounded-xl">
                </div>
            @endforeach
        </div>
    </section>
    <!-- end -->
@endsection
