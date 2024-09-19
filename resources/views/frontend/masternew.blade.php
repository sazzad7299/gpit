<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

<meta name="google-site-verification" content="h4TEWdnAqM0kKIdXUGro0Vviv-OAe-Fs5AlUzpgE37o" />
<meta name="facebook-domain-verification" content="5lfliapkfx1f2mi0jreyexwqdgh2xw" />
 <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PZ9MW9G');</script>
<!-- End Google Tag Manager -->

  @hasSection('meta_box')
    @yield('meta_box')
    @else
 {!! SEOMeta::generate() !!}
  {!! OpenGraph::generate() !!}
  {!! Twitter::generate() !!}
  {!! JsonLd::generate() !!}
  <title>@yield('title')</title>
    @endif




    @php
        $abouts=App\About::first();

    @endphp

     @php
        $seo=App\seo::first();

    @endphp


    <link href="{{asset('uploads/about/'.$abouts->image1)}}" rel="icon">
    <link href="{{asset('uploads/about/'.$abouts->image1)}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('frontend/assets')}}/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{asset('frontend/assets')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('frontend/assets')}}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('frontend/assets')}}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{asset('frontend/assets')}}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{asset('frontend/assets')}}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('frontend/assets')}}/css/style.css" rel="stylesheet">
    <link href="{{asset('frontend/assets')}}/css/custom.css" rel="stylesheet">
    <link href="{{asset('frontend/assets')}}/css/banar.css" rel="stylesheet">


  <!-- =======================================================
  * Template Name: BizLand - v3.7.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <link href="{{asset('frontend/assets')}}/vendor/owlcarousel/css/owl.carousel.min.css" rel="stylesheet">
<link href="{{asset('frontend/assets')}}/vendor/owlcarousel/css/owl.theme.default.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.2/owl.carousel.min.js"></script>

<script src="https://use.fontawesome.com/7aff1dad1e.js"></script>



<style>
  .owl-carousel .item {
      text-align: center;

      vertical-align: middle;
  }

      .owl-carousel .item h4 {
          background-color: #f1f6fe;

      }
</style>

<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=622f30d7dc77b900190d14b8&product=inline-share-buttons" async="async"></script>
</head>

<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PZ9MW9G"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->







  <!-- ======= Top Bar ======= -->

    @include('frontend.header')
  <!-- ======= Header ======= -->

  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <!-- End Hero -->
    @yield('content')

   <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "100956022749672");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v15.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
 <!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('frontend.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
	<!-- Modal -->




<script>
var myModal = new bootstrap.Modal(document.getElementById('myModal'), {})
myModal.show()
</script>



<script type="text/javascript">
  $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 0,
      nav: false,
      dots:false,
      center: true,
      autoplay: true,
      autoplayTimeout: 1000,
      autoplayHoverPause: true,
      responsive: {
          0: {
              items: 4
          },
          600: {
              items: 6
          },
          1000: {
              items: 8
          }
      }
  })
  </script>

  <!-- Vendor JS Files -->
  <script src="{{asset('frontend')}}/assets/vendor/purecounter/purecounter.js"></script>
  <script src="{{asset('frontend')}}/assets/vendor/aos/aos.js"></script>
  <script src="{{asset('frontend')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('frontend')}}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{asset('frontend')}}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{asset('frontend')}}/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{asset('frontend')}}/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="{{asset('frontend')}}/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('frontend')}}/assets/vendor/owlcarousel/js/owl.carousel.min.js"></script>
  <script src="{{asset('frontend')}}/assets/vendor/jquery/jquery-3.6.0.min.js"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('frontend')}}/assets/js/main.js"></script>

  <script src="{{asset('frontend')}}/assets/js/custom.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="custom.js"></script>
</body>

</html>
