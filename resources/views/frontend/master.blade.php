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


    <!-- <link href="{{asset('uploads/about/'.$abouts->image1)}}" rel="icon"> -->
    <link rel="icon" type="image/x-icon" href="https://gpit.com.bd/uploads/about/gpit-2022-03-15-622ff50e2ef19.PNG">
    <!-- <link href="{{asset('uploads/about/'.$abouts->image1)}}" rel="apple-touch-icon"> -->
  <!-- Favicons -->
  <!-- <link href="{{asset('frontend/assets')}}/img/favicon.png" rel="icon"> -->
  <!-- <link href="{{asset('frontend/assets')}}/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('frontend/assets')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('frontend/assets')}}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('frontend/assets')}}/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{asset('frontend/assets')}}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{asset('frontend/assets')}}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{asset('frontend/assets')}}/css/main.css" rel="stylesheet">
  <link href="{{asset('frontend/assets')}}/css/banar.css" rel="stylesheet">
  <style>
    
    @media only screen and (max-width: 600px) {
      .carousel-item {
        padding:90px 0px;
      }
      .carousel-item .btn-exclusive{
          font-size:12px;
      }
    }
</style>
  @stack('style')
</head>

<body class="index-page">

    <!-- ======= Top Bar ======= -->

    @include('frontend.header')

    <!-- ======= Header ======= -->
    @yield('content')


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


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var myModal = new bootstrap.Modal(document.getElementById('myModal'));
        myModal.show();
    });
</script>


  <script src="{{asset('frontend/assets')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('frontend/assets')}}/vendor/php-email-form/validate.js"></script>
  <script src="{{asset('frontend/assets')}}/vendor/aos/aos.js"></script>
  <script src="{{asset('frontend/assets')}}/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{asset('frontend/assets')}}/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="{{asset('frontend/assets')}}/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{asset('frontend/assets')}}/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{asset('frontend/assets')}}/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="{{asset('frontend/assets')}}/vendor/isotope-layout/isotope.pkgd.min.js"></script>


  <!-- Main JS File -->
  <script src="{{asset('frontend/assets')}}/js/main.js"></script>
    @stack('js')
</body>

</html>
