<footer id="footer" class="footer secondary-background">


<section id="clients" class="clients section">
    @php
    $page = DB::table('pages')->orderBy('id', 'ASC')->skip(9)->first();

    if ($page == null) {
    } else {
    $clinets = DB::table('frontends')
    ->where('page_id', $page->id)
    ->orderBy('id', 'DESC')
    ->limit(12)
    ->get();
    }
    @endphp
    <div class="container">
        <div class="swiper">
            <script type="application/json" class="swiper-config">
                {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                        "delay": 5000
                    },
                    "slidesPerView": "auto",
                    "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                    },
                    "breakpoints": {
                        "320": {
                            "slidesPerView": 2,
                            "spaceBetween": 40
                        },
                        "480": {
                            "slidesPerView": 3,
                            "spaceBetween": 60
                        },
                        "640": {
                            "slidesPerView": 4,
                            "spaceBetween": 80
                        },
                        "992": {
                            "slidesPerView": 6,
                            "spaceBetween": 120
                        }
                    }
                }
            </script>
            <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide"><img src=" {{ asset('frontend/assets')}}/img/clients/client-1.png" class="img-fluid" alt=""></div>
                @if ($clinets != null)
                @foreach ($clinets as $clinet)
                <div class="swiper-slide">
                    <h4>
                        <a href="{{ url('/' . $clinet->f_slug) }}"> <img src="{{ asset('uploads/website/' . $clinet->image) }}" class="img-fluid" alt="">
                        </a>
                    </h4>
                </div>
                @endforeach
                @endif
            </div>
        </div>

    </div>

</section>
<div class="container footer-top">
@php
    $abouts=App\About::first();
    $settings=App\settings::first();
    $sociallink=App\sociallink::first();

    $menus=App\Page::where('header_show',1)->orderby('page_number','ASC')->take(3)->get();
    $frontends=App\Frontend::orderby('id','DESC')->take(3)->get();
    @endphp

  <div class="row gy-4">
    <div class="col-lg-4 col-md-6 footer-about">
    <a href="{{url('/')}}" class="logo"><img src="{{asset('uploads/about/'.$abouts->image)}}" alt="{{$abouts->image_alt}}" title="{{$abouts->image_alt}}" width="130px"></a>
      <div class="footer-contact pt-3">
          <p>
            {{$settings->address}}<br>
            <strong>Phone:</strong>  {{$settings->number}}<br>
            <strong>Email:</strong>  {{$settings->email}}<br>
          </p>
      </div>
    </div>

    <div class="col-lg-2 col-md-3 footer-links">
      <h4>Latest Links</h4>
      <ul>
      @foreach ($frontends as $menu)
            <li><i class="bx bx-chevron-right"></i> <a href="{{url("/".$menu->f_slug)}}">{{$menu->name}}</a></li>
            @endforeach

      </ul>
    </div>

    <div class="col-lg-2 col-md-3 footer-links">
      <h4>Useful Links</h4>
      <ul>
      @foreach ($menus as $menu)
            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('page.view', $menu->slug) }}">{{$menu->p_name}}</a></li>
            @endforeach
            <li><i class="bx bx-chevron-right"></i> <a href="{{url("/page/Terms-&-Conditions")}}">Terms & Conditions</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="{{url("/page/Privacy-Policy")}}">Privacy Policy</a></li>
      </ul>
    </div>

    <div class="col-lg-4 col-md-12">
      <h4>Follow Us</h4>
      <p>{{$abouts->about}}</p>
      <div class="social-links d-flex">
        <a href="{{$sociallink->twi}}"><i class="bi bi-twitter-x"></i></a>
        <a href="{{$sociallink->fb}}"><i class="bi bi-facebook"></i></a>
        <a href="{{$sociallink->insta}}"><i class="bi bi-instagram"></i></a>
        <a href="{{$sociallink->yout}}"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
  </div>
</div>
</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<!-- <div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div> -->
