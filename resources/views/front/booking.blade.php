<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Hotel Website</title>
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!-- swiper js cdn link -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!-- custom css link -->
   <link rel="stylesheet" href="../assets/css/front.css">
</head>
<body>

   <!-- header -->

   <header class="header">

      <a href="#" class="logo"> <i class="fas fa-hotel"></i> hotel </a>

      <nav class="navbar">
         <a href="#/landing/home">home</a>
         <a href="#/landing/about">about</a>
         <a href="#/landing/room">room</a>
         <a href="/landing/#gallery">gallery</a>
         <a href="/landing/#reservation" class="btn"> book now</a>
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>

   </header>

   <!-- end -->


   <!-- reservation -->

   <section class="reservation" id="reservation" style="margin-top: 100px">

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
               <p>children <span>*</span></p>
               <select name="child" class="input">
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
               <select name="rooms" class="input">
                  <option value="1">1 rooms</option>
                  <option value="2">2 rooms</option>
                  <option value="3">3 rooms</option>
                  <option value="4">4 rooms</option>
                  <option value="5">5 rooms</option>
                  <option value="6">6 rooms</option>
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
   
         </div>

         <input type="submit" value="check availability" class="btn">

      </form>

   </section>

   <!-- end -->

   <!-- footer -->

   <section class="footer">

      <div class="box-container">

         <div class="box">
            <h3>contact info</h3>
            <a href="#"> <i class="fas fa-phone"></i> +123-852-4565 </a>
            <a href="#"> <i class="fas fa-phone"></i> +123-852-4565</a>
            <a href="#"> <i class="fas fa-envelope"></i> ninjashub4@gmail.com</a>
            <a href="#"> <i class="fas fa-map"></i> karachi, pakistan</a>
         </div>

         <div class="box">
            <h3>quick links</h3>
            <a href="#"> <i class="fas fa-arrow-right"></i> home</a>
            <a href="#"> <i class="fas fa-arrow-right"></i> about</a>
            <a href="#"> <i class="fas fa-arrow-right"></i> rooms</a>
            <a href="#"> <i class="fas fa-arrow-right"></i> gallery</a>
            <a href="#"> <i class="fas fa-arrow-right"></i> reservation</a>
         </div>

         <div class="box">
            <h3>extra links</h3>
            <a href="#"> <i class="fas fa-arrow-right"></i> refund policy</a>
            <a href="#"> <i class="fas fa-arrow-right"></i> refund policy</a>
            <a href="#"> <i class="fas fa-arrow-right"></i> refund policy</a>
            <a href="#"> <i class="fas fa-arrow-right"></i> refund policy</a>
            <a href="#"> <i class="fas fa-arrow-right"></i> refund policy</a>
         </div>

      </div>

      <div class="share">
         <a href="#" class="fab fa-facebook-f"></a>
         <a href="#" class="fab fa-instagram"></a>
         <a href="#" class="fab fa-twitter"></a>
         <a href="#" class="fab fa-pinterest"></a>
      </div>

      <div class="credit">&copy; copyright @ 2023 by <span>ninjashub</span></div>

   </section>

   <!-- end -->


   <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

   <script src="../assets/js/front.js"></script>

</body>
</html>