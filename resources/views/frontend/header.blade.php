@php
$settings=App\settings::first();
$social=App\sociallink::first();
$cathad=App\Category::where('show_on_header',1 AND 'status',1)->get();
$mcathad=App\VideoCategory::where('show_on_header',1 AND 'status',1)->get();

$subcathad=App\Subcategory::where('show_on_header',1 && 'status',1)->get();
$lnews=App\post::where('status',1)->orderBy('id', 'desc')->take(5)->get();
$wcathad=App\Category::where('show_on_header',1 AND 'status',1)->take(10)->get();
$wvcathad=App\VideoCategory::where('show_on_header',1 AND 'status',1)->take(6)->get();
$abouts=App\About::first();
$menus=App\Page::where('header_show',1)->orderby('page_number','ASC')->take(6)->get();
$frontends=App\frontend::orderby('id','ASC')->get();
$settings=App\settings::first();
$sociallink=App\sociallink::first();
@endphp

<header id="header" class="header sticky-top">

    <div class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <a href="{{url('https://basis.org.bd/company-profile/22-11-043')}}" class="logo"><img style="height: 35px" src="{{asset('frontend/assets/img/BASIS-Member-Logo.jpg')}}" alt="" title=""></a>



                <i class="bi d-flex align-items-center">

                    @php
                    $page=DB::table('pages')->orderBy('id', 'ASC')->skip(8)->first();

                    if ($page==null) {

                    } else {


                    $contacts=DB::table('frontends')->where('page_id',$page->id)->orderBy('id', 'DESC')->limit(1)->get();
                    }
                    @endphp
                    @if ($page != null)
                    <a href="{{ route('page.view', $page->slug) }}">Location</a>


                    @endif

                </i>

                <i class="bi bi-phone d-flex align-items-center ms-4"><span>{{$settings->number}}</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="{{$sociallink->twi}}" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="{{$sociallink->fb}}" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="{{$sociallink->insta}}" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="{{$sociallink->yout}}" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>
        </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-cente">

        <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="{{url('/')}}" class="logo"><img src="{{asset('uploads/about/'.$abouts->image)}}" alt="{{$abouts->image_alt}}" title="{{$abouts->image_alt}}"></a>

            <nav id="navmenu" class="navmenu">
                <ul >
                    @foreach ($menus as $menu)
                    <li class="dropdown"><a href="{{ route('page.view', $menu->slug) }}"><span>{{$menu->p_name}}</span><i class="bi bi-chevron-down"></i></a>
                     @if($menu->slug !="Blog")
                     <ul style="max-height: 80vh;scroll-behavior: smooth;overflow-x: auto;">
                        @foreach ($frontends as $frontend)
                        @if($menu->id == $frontend->page_id)
                        <li>
                            <a href="{{url("/".$frontend->f_slug)}}">
                                {{$frontend->name}}
                            </a>
                        </li>
                        @endif
                        @endforeach

                    </ul>
                     @endif
                    @endforeach
                    </li>

                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>

    </div>

</header>
