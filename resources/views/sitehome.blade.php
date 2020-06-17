<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <meta charset="utf-8">
  <title>Service Friend</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta content="Author" name="ngh">
  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('assets/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('assets/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/lib/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"> 
</head>

<body id="body">
  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="#body" class="scrollto"><span><i class="fa fa-car" aria-hidden="true"></i> </span> ServiceFriend</a></h1> 
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#body">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Services</a></li>
         
		
          
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero" class="clearfix">
<div class="container">

      <div class="hero-banner">
        
      </div>

      <div class="hero-content">
        <h2>Love Your Vechicle<br><span>Fast Service & <br> Parts Delivery</span></h2>
        <div>
          <a href="/register/user" class="btn-banner">Register As User</a><br/><br/> <a href="register/servicecenter" class="btn-banner">Register As Service Center</a>
          <br/><br/> <a href="/login" class="btn-banner">Login As User</a>
          <br/><br/> <a href="{{ route('servicecenterlogin')}}" class="btn-banner">Login As Service Center</a>
        </div>
      </div>

    </div> 
  </section><!-- #Hero -->

  <main id="main">

    <!--==========================
      About Section
    ============================-->
    <section id="about" class="wow fadeInUp">
      <div class="container">
	    <div class="section-header">
          <h2>About ServiceFriend</h2>
          <p>We are a community of service centers and provide services to customers online</p>
        </div>
        <div class="row">
          <div class="col-lg-6 about-img">
            <img src="{{ asset('assets/img/carwash.png') }}" alt="">
          </div>

          <div class="col-lg-6 content">
            <h2>We have a vast collection of spare parts which will be distributed among service centers who registered in this community</h2>
            <h3>The Administrator is the wholesaler who provides Spare Parts Among service centers</p>
            <ul>
              <li><i class="icon ion-ios-checkmark-outline"></i> Customers registered in this site can request for service to their favourite service center.</li>
              <li><i class="icon ion-ios-checkmark-outline"></i> Customers can request Parts to service centers.</li>
              <li><i class="icon ion-ios-checkmark-outline"></i> Service centers can request parts to the admin(wholesaler)</li>
            </ul> 
          </div>
        </div>

      </div>
    </section><!-- #about -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container">
        <div class="section-header">
          <h2>Our Services</h2>
          <p>We are the best to serve</p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="box wow fadeInLeft">
              <div class="icon"><i class="fa fa-wifi" aria-hidden="true"></i></div>
              <h4 class="title"><a href="#">Vechicle Check</a></h4>

            </div>
          </div>

          <div class="col-lg-4">
            <div class="box wow fadeInRight">
              <div class="icon"><i class="fa fa-shopping-basket" aria-hidden="true"></i></div>
              <h4 class="title"><a href="#">Vechicle Wash</a></h4>
             
            </div>
          </div>


          <div class="col-lg-4">
            <div class="box wow fadeInRight" data-wow-delay="0.2s">
              <div class="icon"><i class="fa fa-line-chart" aria-hidden="true"></i></div>
              <h4 class="title"><a href="#">Parts Delivery</a></h4>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="box wow fadeInLeft" data-wow-delay="0.2s">
              <div class="icon"><i class="fa fa-pie-chart" aria-hidden="true"></i></div>
              <h4 class="title"><a href="#">Vechicle Painting</a></h4>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="box wow fadeInRight" data-wow-delay="0.2s">
              <div class="icon"><i class="fa fa-location-arrow" aria-hidden="true"></i></div>
              <h4 class="title"><a href="#">24/7 Support</a></h4>
            </div>
          </div>
        </div>

      </div>
    </section><!-- #services -->

    <!--==========================
      Clients Section
    ============================-->
    

    <!--==========================
      Our Portfolio Section
    ============================-->
    

    <!--==========================
      Testimonials Section
    ============================-->
   
 <!-- pricing area start -->
  
    <!-- pricing area end -->
    <!--==========================
      Our Team Section
    ============================-->
    
    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="wow fadeInUp">

      <div class="container mb-4 map">
	  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d387191.33750346623!2d-73.979681!3d40.6974881!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1541477355474" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe> 
      </div>
 
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        All Rights Reserved
      </div>
      <div class="credits"> 
       ServiceFriend</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript  -->
  <script src="{{ asset('assets/lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('assets/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('assets/lib/superfish/hoverIntent.js') }}"></script>
  <script src="{{ asset('assets/lib/superfish/superfish.min.js') }}"></script>
  <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/lib/magnific-popup/magnific-popup.min.js') }}"></script>
  <script src="{{ asset('assets/lib/sticky/sticky.js') }}"></script> 
 <script src="{{ asset('assets/contact/jqBootstrapValidation.js') }}"></script>
 <script src="{{ asset('assets/contact/contact_me.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>


</html>
