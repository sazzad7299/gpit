@extends('frontend.master')
@section('meta_box')
{!! $seof->meta_box !!}
@endsection
@section('title')
@php
$abouts = App\About::first();
@endphp


{{ $abouts->name }}
@endsection
@section('content')

@php
$page = DB::table('pages')->orderBy('id', 'ASC')->skip(10)->first();

if ($page == null) {
} else {
$models = DB::table('frontends')
->where('page_id', $page->id)
->orderBy('id', 'DESC')
->limit(1)
->get();
}
@endphp

@if ($page != null)



@if ($models != null)
@foreach ($models as $model)
<!-- Modal -->
<!-- <div class="container">
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">


                <button type="button" class="btn btn-danger btn-simple btn-close" data-bs-dismiss="modal"style="width: 100%"></button>
                <a href="{{ url('/' . $model->f_slug) }}">
                    <img style="width: 498px;height: 300px;" src="{{ asset('uploads/website/' . $model->image) }}" alt="slide" />
                </a>
            </div>
        </div>
    </div>
</div> -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body" style="background-color: #00baf1;">
                <a href="{{ url('/' . $model->f_slug) }}">
                    <img style="width: -webkit-fill-available;height: auto" src="{{ asset('uploads/website/' . $model->image) }}" alt="slide" />
                </a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif
@endif




<!-- ======= Hero Section ======= -->
@php
$page = DB::table('pages')->orderBy('id', 'ASC')->first();

if ($page == null) {
} else {
$slides = DB::table('frontends')
->where('page_id', $page->id)
->orderBy('id', 'DESC')
->limit(3)
->get();
$video = DB::table('frontends')
->where('page_id', 86)->first();
$video1 = DB::table('frontends')
->where('page_id', 86)->skip(1)->first();

$promosion = DB::table('frontends')
->where('page_id', 87)->first();
    //if (count($slides) >= 3) {
    //$slide1 = $slides[0];
   // $slide2 = $slides[1];
   // $slide3 = $slides[2];
    //} else {
    // Handle the case where there are less than 3 slides
    //$slide1 = $slides[0] ?? null;
    //$slide2 = $slides[1] ?? null;
    //$slide3 = $slides[2] ?? null;
    //}
}
@endphp
<div id="hero" class="hero-section primary-background">
<div class="row gy-4">

<div class="col-lg-8 order-2 order-lg-1 d-flex flex-column justify-content-center aos-init aos-animate b1" data-aos="zoom-out" >
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($slides as $key=>$slider)
            <div class="carousel-item @if($key==0) active @endif" style="background-image:url({{asset('uploads/website/'.$slider->image)}});background-repeat: no-repeat;background-size:contain">
                <div class="d-flex justify-content-center">
                    <a href="{{url("/".$slider->f_slug)}}" class="btn btn-exclusive" style="margin-right:5px">Learn More</a>
                    <a href="{{url("/get-free-quate")}}" class="btn btn-exclusive">Book a Metting</a>
                </div>
            </div>

        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>

</div>

<div class="col-lg-4 order-2 order-lg-1 d-flex flex-column justify-content-center aos-init aos-animate" data-aos="zoom-out">
    <div class="row gy-1">
        <div class="d-flex  b2"  style="padding: 0px;">
        @if(isset($video))
        <a href="{{url("/".$video->f_slug)}}" style="margin:0px">
        <div class="col-md-7 " style="background-image:url({{asset('uploads/website/'.$video->image)}});background-repeat: no-repeat;padding:20px 0; margin-right:2px">
            <!-- <h3>{{$video->name}}</h3> -->
            <br />
            <div class="d-flex justify-content-center">
            <a href="{{url("/".$video->f_slug)}}" > <img src="{{asset('frontend/assets/img/play.png')}}" alt="" ></a>
            </div>
        </div>
        </a>
        @endif
        @if(isset($video1))
        <a href="{{url("/".$video1->f_slug)}}" style="margin:0px">
        <div class="col-md-5" style="background-image:url('{{asset('uploads/website/'.$video1->image)}}');background-repeat: no-repeat; padding:20px 0;">
            <!-- <h3>{{$video->name}}</h3> -->
            <br />
            <div class="d-flex justify-content-center">
            <a href="{{url("/".$video1->f_slug)}}" > <img src="{{asset('frontend/assets/img/play.png')}}" alt=""></a>
            </div>
        </div>
        </a>
        @endif
        </div>
        
        @if (isset($promosion))
        <div class="col-lg-12 b3" style="background-image:url({{asset('uploads/website/'.$promosion->image)}});background-repeat: no-repeat;padding:80px 0">
            <!-- <h3>{{$promosion->name}}</h3> -->
            <br />
            <div class="d-flex justify-content-end mr-5">
                <a href="{{url("/".$promosion->f_slug)}}" class="btn btn-exclusive ">Learn More</a>
            </div>
        </div>
        @endif
    </div>
</div>
</div>
</div>
<section id="about" class="about section secondary-background">
    @php
    $page = DB::table('pages')->orderBy('id', 'ASC')->skip(1)->first();

    if ($page == null) {
    } else {
    $abouts = DB::table('frontends')
    ->where('page_id', $page->id)
    ->orderBy('id', 'ASC')
    ->limit(2)
    ->get();
    }
    @endphp
    @if ($page != null)
    @endif
    @if ($abouts != null)
    @foreach ($abouts as $key =>$about)
    <!-- End Section Title -->
    @if($key==1)
    <div class="container">
        <div class="card border-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{ asset('uploads/website/' . $about->image) }}" alt="" class="img-fluid rounded-2">
                    </div>

                    <div class="col-lg-6 d-flex flex-column justify-content-center" >
                        <div class="container section-title" >
                            <p><span class="description-title">{{$about->name}}</span></p>
                        </div>
                        <div class="about-content ps-0 ps-lg-3">
                            <p>{!! $about->short_description !!}</p>

                        </div>
                        <div class="d-flex justify-content-center" style="margin-top: 20px;">
                             <a href="{{ url('/page/Services') }}" class="btn  btn-exclusive" style="margin-right: 20px;">Our Services</a>
                            <a href="{{ url('/' . $about->f_slug) }}" class="btn  btn-exclusive" >Read More</a>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    @endif

</section><!-- /About Section -->

<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <div class="container">

        @php
        $page = DB::table('pages')->orderBy('id', 'ASC')->skip(2)->first();

        if ($page == null) {
        } else {
        $services = DB::table('frontends')
        ->where('page_id', $page->id)
        ->orderBy('number', 'asc')
        ->limit(6)
        ->get();
        }
        @endphp
         @if ($page != null)
        <div class="section-title">
            <div class="section-title">
                <p><span>Our&nbsp;</span> <span class="description-title">{{$page->p_name }}</span></p>
            </div>
        </div>
        <div class="row">
            @if ($services != null)
            @foreach ($services as $service)

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <a href="{{ url('/' . $service->f_slug) }}">
                <div class="icon-box">
                    <div class="icon">
                    {!! $service->icon !!}

                    </div>
                    <h4><a href="{{ url('/' . $service->f_slug) }}">{{ $service->name }}</a></h4>
                    <p style="text-align:justify">
                        {{ $service->short_description }}
                    </p>
                </div>
                </a>
            </div>

            @endforeach
        </div>
        @endif
        @endif
    </div>
</section><!-- End Services Section -->
<!-- counter Stats Section -->
<section id="stats" class="stats section secondary-background">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

            <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                <i class="bi bi-emoji-smile"></i>
                <div class="stats-item">
                    <span data-purecounter-start="0" data-purecounter-end="1239" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Happy Clients</p>
                </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                <i class="bi bi-journal-richtext"></i>
                <div class="stats-item">
                    <span data-purecounter-start="0" data-purecounter-end="451" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Projects</p>
                </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                <i class="bi bi-headset"></i>
                <div class="stats-item">
                    <span data-purecounter-start="0" data-purecounter-end="300" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Services</p>
                </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                <i class="bi bi-people"></i>
                <div class="stats-item">
                    <span data-purecounter-start="0" data-purecounter-end="2000" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Connections</p>
                </div>
            </div><!-- End Stats Item -->

        </div>

    </div>

</section>
<!-- /counter end Section -->

<!-- ======= Services Section ======= -->
<section id="portfolio" class="services portfolio">
    <div class="container">

        @php
        $page = DB::table('pages')->orderBy('id', 'ASC')->skip(5)->first();

        if ($page == null) {
        } else {
        $services = DB::table('frontends')
        ->where('page_id', $page->id)
        ->orderBy('number', 'asc')
        ->limit(6)
        ->get();
        }
        @endphp
        @if ($page != null)
        <div class="section-title">
            <p><span>Our&nbsp;</span> <span class="description-title">{{$page->p_name }}s</span></p>
        </div>
        @if ($services != null)
        <div class="row">
            @foreach ($services as $service)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <a href="{{ url('/' . $service->f_slug) }}">
                <div class="icon-box icon-box-padding">
                    <div class="img"> <img src="{{ asset('uploads/website/' . $service->image) }}" class="img-fluid" alt=""></div>
                    <h4><a href="{{ url('/' . $service->f_slug) }}">{{ $service->name }}</a></h4>
                    <p style="text-align:justify">
                        {{ $service->short_description }}
                    </p>
                </div>
                </a>
            </div>
            @endforeach
        </div>
        @endif
        @endif
    </div>
</section><!-- End Services Section -->
<!-- Clients Section -->
<section id="clients" class="clients section secondary-background">
    @php
    $page = DB::table('pages')->orderBy('id', 'ASC')->skip(4)->first();

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
        <div class="section-title">
            @if ($page != null)
            <p><span>Our&nbsp;</span> <span class="description-title">{{$page->p_name }}s</span></p>
            @endif

        </div>
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
                            "slidesPerView": 3,
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

<section id="courses" class="courses section">
    <div class="container">
        @php
        $page = DB::table('pages')->orderBy('id', 'ASC')->skip(11)->first();

        if ($page == null) {
        } else {
        $coures = DB::table('frontends')
        ->where('page_id', $page->id)
        ->orderBy('id', 'DESC')
        ->limit(6)
        ->get();
        }
        @endphp

        @if ($page != null)



        @if ($coures != null)
        <div class="container">
            <div class="section-title">
            @if ($page != null)
            <p><span>Our&nbsp;</span> <span class="description-title">{{$page->p_name }}</span></p>
            @endif

            </div>
            <div class="row justify-content-center">
                @foreach ($coures as $coure)
                <div class="col-md-4 mx-auto">
                    <a href="{{ url('/' . $coure->f_slug) }}">
                    <div class="card" style="margin-top: 20px" ;>
                        <img class="card-img-top" src="{{ asset('uploads/website/' . $coure->image) }}" style="height:250px " alt="Card image cap">
                        <div class="card-body">
                            <a href="{{ url('/' . $coure->f_slug) }}">
                                <p class="card-title" style="min-height:50px ">{{ $coure->name }}</p>
                            </a>
                            <p style="text-align:justify;min-height:100px" class="card-text">{!! Str::limit($coure->short_description, 100, ' ...') !!}
                            </p>

                        </div>
                    </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        @endif
    </div>
</section><!-- End Testimonials Section -->


<!-- Key Management Section -->
<section id="team" class="team section primary-background">
    @php
    $page = DB::table('pages')->orderBy('id', 'ASC')->skip(17)->first();

    if ($page == null) {
    } else {
    $teams = DB::table('frontends')
    ->where('page_id', $page->id)
    ->orderBy('number', 'ASC')
    ->orderBy('id', 'DESC')
    ->limit(4)
    ->get();
    }
    @endphp
    <!-- Section Title -->
    <div class="container section-title">
        <div class="section-title">
            @if ($page != null)
            <p><span>Our&nbsp;</span> <span class="description-title">{{$page->p_name }}</span></p>
            @endif
        </div>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row gy-4">
            @if ($teams != null)
            @foreach ($teams as $team)
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="team-member bg-white">
                    <div class="member-img">
                        <img src="{{ asset('uploads/website/' . $team->image) }}" class="img-fluid" alt="">
                    </div>
                    <div class="member-info">
                        <h4><a href="{{ url('/' . $team->f_slug) }}">{{ $team->name }}</a></h4>
                        <span>{{ $team->short_description }}</span>
                    </div>
                </div>
            </div><!-- End Team Member -->
            @endforeach
            @endif
        </div>

    </div>

</section>

<section id="team" class="team">
    @php
    $page = DB::table('pages')->orderBy('id', 'ASC')->skip(6)->first();

    if ($page == null) {
    } else {
    $teams = DB::table('frontends')
    ->where('page_id', $page->id)
    ->orderBy('number', 'ASC')
    ->orderBy('id', 'DESC')
    ->limit(4)
    ->get();
    }
    @endphp
    <!-- Section Title -->
    <div class="container section-title">
        <div class="section-title">
            @if ($page != null)
            <p><span>Our&nbsp;</span> <span class="description-title">{{$page->p_name }}</span></p>

            @endif
        </div>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row gy-4">
            @if ($teams != null)
            @foreach ($teams as $team)
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="team-member bg-white">
                    <div class="member-img">
                        <img src="{{ asset('uploads/website/' . $team->image) }}" class="img-fluid" alt="" width="100%">
                    </div>
                    <div class="member-info">
                        <h4><a href="{{ url('/' . $team->f_slug) }}">{{ $team->name }}</a></h4>
                        <span>{{ $team->short_description }}</span>
                    </div>
                </div>
            </div><!-- End Team Member -->
            @endforeach
            @endif
        </div>

    </div>
</section>
<!-- About Section -->
<section id="about" class="about section secondary-background">
    @php
    $page = DB::table('pages')->orderBy('id', 'ASC')->skip(1)->first();

    if ($page == null) {
    } else {
    $abouts = DB::table('frontends')
    ->where('page_id', $page->id)
    ->orderBy('id', 'ASC')
    ->limit(2)
    ->get();
    }
    @endphp
    @if ($page != null)
    @endif
    @if ($abouts != null)
    @foreach ($abouts as $key=>$about)
    <!-- End Section Title -->

    @if($key==0)
    <div class="container">
        <div class="card border-0">
            <div class="card-body">
                <div class="row">

                    <div class="col-lg-6 d-flex flex-column justify-content-center" >
                        <div class="container section-title" >
                            <p><span class="description-title">{{$about->name}}</span></p>
                        </div>
                        <div class="about-content ps-0 ps-lg-3">
                            <p>{!! $about->short_description !!}</p>

                        </div>
                        <div class="d-flex justify-content-center mb-2" style="margin-top: 20px;">
                            
                            <a href="{{ url('/page/Services') }}" class="btn  btn-exclusive read_more" style="margin-right: 20px;">Our Services</a>
                            <a href="{{ url('/' . $about->f_slug) }}" class="btn  btn-exclusive" style="margin-right: 20px;">Read More</a>
                            <a href="{{url("/get-free-quate")}}" class="btn btn-exclusive">Book a Metting</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ asset('uploads/website/' . $about->image) }}" alt="" class="img-fluid rounded-2">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    @endif

</section>
<!-- /Gallery Section -->
<section id="portfolio" class="portfolio section">

    @php
    $page = DB::table('pages')->orderBy('id', 'ASC')->skip(14)->first();

    if ($page == null) {
    } else {
    $project = DB::table('frontends')
    ->where('page_id', $page->id)
    ->orderBy('id', 'DESC')
    ->limit(6)
    ->get();
    }
    @endphp
    <div class="container section-title">
        @if ($page != null)
        <p><span>Our&nbsp;</span> <span class="description-title">{{$page->p_name }}</span></p>
        @endif
    </div><!-- End Section Title -->

    <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

            <ul class="portfolio-filters isotope-filters">
                <li data-filter="*" class="filter-active d-none">All</li>
            </ul>

            <div class="row gy-4 isotope-container">
                @if ($project != null)
                @foreach ($project as $project)
                <div class="col-lg-4 col-md-6 portfolio-item isotope-item ">
                    <img src="{{ asset('uploads/website/' . $project->image) }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>{{ $project->name }}</h4>
                        <a href="{{ asset('uploads/website/' . $project->image) }}" title="{{ $project->name }}" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="{{ url('/' . $project->f_slug) }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>

                @endforeach
                @endif

            </div><!-- End Portfolio Container -->

        </div>

    </div>

</section>
<!-- /Gallery Section -->
 <!-- ======= Job and Carrier Section ======= -->
<section id="services" class="services secondary-background">
    <div class="container">

        @php
        $page = DB::table('pages')->orderBy('id', 'ASC')->skip(15)->first();

        if ($page == null) {
        } else {
        $services = DB::table('frontends')
        ->where('page_id', $page->id)
        ->orderBy('number', 'ASC')
        ->orderBy('id', 'DESC')
        ->limit(6)
        ->get();
        }
        @endphp

        <div class="section-title">
            @if ($page != null)
            <a href="{{ route('page.view', $page->slug) }}">
                <h3>{{ $page->p_name }}</h3>
            </a>




        </div>

        <div class="row">
            @if ($services != null)
            @foreach ($services as $service)
            <div class="card" style=" margin:10px;">
                <div class="card-title ">
                    <h4 style=" margin:0;padding:15px"> <a href="{{ url('/' . $service->f_slug) }}">{{ $service->name }}</a></h4>
                </div>
            </div>
            @endforeach
        </div>
        @endif
        @endif
    </div>
</section>
<!-- Testimonials Section -->
<section id="testimonials" class="testimonials section">

    <img src="/frontend/assets/img/testimonials-bg.jpg" class="testimonials-bg" alt="">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

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
                    }
                }
            </script>
            <div class="swiper-wrapper">
                @php
                $page = DB::table('pages')->orderBy('id', 'ASC')->skip(3)->first();

                if ($page == null) {
                } else {
                $testimonials = DB::table('frontends')
                ->where('page_id', $page->id)
                ->orderBy('number', 'ASC')
                ->orderBy('id', 'DESC')
                ->limit(6)
                ->get();
                }
                @endphp
                @if ($page != null)

                @if ($testimonials != null)
                @foreach ($testimonials as $testimonial)
                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <img src="{{ asset('uploads/website/' . $testimonial->image) }}" class="testimonial-img" alt="">
                        <h3>{{ $testimonial->name }}</h3>

                        <p style="text-align:justify">
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            {{ $testimonial->short_description }}
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                </div><!-- End testimonial item -->

                @endforeach
                @endif
                @endif
            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>

</section>

<!-- End Services Section -->
<!-- Faq Section -->
<section id="faq" class="faq section primary-background">

    <!-- Section Title -->
    <div class="container section-title">
    <p><span>Frequently Asked</span> <span class="description-title">Questions</span></p>
    </div><!-- End Section Title -->
    @php
    $faqs =  DB::table('frontends')
                ->where('page_id', 88)
                ->orderBy('id', 'ASC')
                ->limit(5)
                ->get();

    @endphp
    <div class="container">

    <div class="row justify-content-center">

        <div class="col-lg-10" >

        <div class="faq-container">
            @foreach ($faqs as $key=>$faq)
            <div class="faq-item @if($key==0)faq-active @endif">
                <h3>{{$faq->name}}</h3>
                <div class="faq-content">
                    <p>{{ $faq->short_description }}</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
            </div>
            @endforeach
            <!-- End Faq item-->



        </div>

        </div><!-- End Faq Column-->

    </div>

    </div>

</section><!-- /Faq Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" >
        <p><span>Need Help?</span> <span class="description-title">Contact Us</span></p>
      </div><!-- End Section Title -->

      <div class="container" >

        <div class="row gy-4">

          <div class="col-lg-5">

            <div class="info-wrap">
              <div class="info-item d-flex">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Address</h3>
                  <p>164/1, BRB Cable Building (2nd Floor) Sabujbagh, Middle Basaboo, Dhaka-1214.</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" >
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Call Us</h3>
                  <p>+8801611536464</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex"  >
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  <p>care.gpit@gmail.com</p>
                </div>
              </div><!-- End Info Item -->

              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14608.77019117557!2d90.4284183!3d23.7405122!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b95ef3387f39%3A0xe98433eb973f2228!2sGPIT!5e0!3m2!1sen!2sbd!4v1720188813655!5m2!1sen!2sbd" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>

          <div class="col-lg-7">
            <form action="{{ route('email.store') }}" method="POST" role="form"  class="php-email-form" style="background:#EFEFEF">
                @csrf
              <div class="row gy-4">

                <div class="col-md-6">
                  <label for="name-field" class="pb-2">Your Name</label>
                  <input type="text" name="name" id="name-field" class="form-control" required="">
                </div>

                <div class="col-md-6">
                  <label for="email-field" class="pb-2">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email-field" required="">
                </div>
                <div class="col-md-6">
                  <label for="phone-field" class="pb-2">Phone</label>
                  <input type="text" class="form-control" name="phone" id="phone-field" required="">
                </div>
                <div class="col-md-6">
                  <label for="subject-field" class="pb-2">Subject</label>
                  <input type="text" class="form-control" name="subject" id="subject-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="message-field" class="pb-2">Message</label>
                  <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <!-- <button type="submit">Send Message</button> -->
                  <input type="submit" value="Send Message">
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->
<!-- ======= Contact Section ======= -->

<!-- <section id="contact" class="contact">
    <div class="container">

        <div class="section-title">
            @php
            $page = DB::table('pages')->orderBy('id', 'ASC')->skip(8)->first();

            if ($page == null) {
            } else {
            $contacts = DB::table('frontends')
            ->where('page_id', $page->id)
            ->orderBy('id', 'DESC')
            ->limit(1)
            ->get();
            }
            @endphp
            @if ($page != null)
            <a href="{{ route('page.view', $page->slug) }}">
                <h3>{{ $page->p_name }}</h3>
            </a>
            @endif

        </div>
        <div class="container">
            <div class="card border-0">
                <div class="card-body">
                    @if ($contacts != null)
                    @foreach ($contacts as $contact)
                    <div class="row">
                        <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                            <div class="about-content ps-0 ps-lg-3">
                                <h2>{{$contact->name}}</h2>
                                <p style="text-align:justify">{{ $contact->short_description }}</p>
                            </div>
                        </div>
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            {!! $contact->description !!}
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>


</section> -->
<!-- End Contact Section -->

@endsection
