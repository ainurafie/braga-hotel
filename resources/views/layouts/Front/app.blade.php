<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://cdn.tailwindcss.com"></script>
   <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
   <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
   <title>@yield('title')</title>
   @include('layouts.Front.style')
   @stack('css')
</head>
<body>

   <!-- header -->

   <header class="header">

      @include('layouts.Front.includes.menu')

   </header>

   <!-- end -->

   @yield('content')

   @include('layouts.Front.footer')

   <!-- end -->


   @include('layouts.Front.script')
   @stack('js')

</body>

</body>
</html>