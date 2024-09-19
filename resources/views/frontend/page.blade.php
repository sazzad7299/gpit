@extends('frontend.master')
@section('content')


<section id="about" class="about section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">

        @foreach ($frontends as $page)
        @if ($page->page_id==null)
        <td>{{ 'Country Delete' }}</td>
         @else

        <h3><span>{{$page->p_name}}</span></h3>
        <em>{{$page->page_description}}</em>
         @endif
         @break
        @endforeach
      </div>





      @foreach ($frontends as $frontend)
      @if ($frontend->page_type==0)
      <div class="row">
        <div class="col-lg-4"  >
          <img style="height: 280px;" src="{{asset('uploads/website/'.$frontend->image)}}" class="img-fluid" alt="">
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" >

          <h5>{{$frontend->short_description}}</h5>
        </div>

        <div class="col-lg-12 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" >

           {!!$frontend->description!!}

        </div>


      </div>
      @endif
      @break
        @endforeach

      <div class="row">

        <!--<div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">-->
        <!--  <div class="icon-box">-->
        <!--    <div class="icon"><img style="width:150px;" src="{{asset('uploads/website/'.$frontend->image)}}"></div>-->
        <!--    <h4><a href="{{url("/".$frontend->f_slug)}}">{{$frontend->name}}</a></h4>-->
        <!--    <p>-->
        <!--      {{$frontend->short_description}}-->



        <!--    </p>-->
        <!--  </div>-->
        <!--</div>-->

         <div class="container">
          <div class="row justify-content-center">
           @foreach ($frontends as $frontend)
        @if ($frontend->page_type==1)
            <div class="col-md-4 mx-auto">
             <div class="card" style="margin: 10px";>
                <img class="card-img-top" src="{{asset('uploads/website/'.$frontend->image)}}"  style="height:239px " alt="Card image cap">
                <div class="card-body">
                  <a href="{{url("/".$frontend->f_slug)}}" ><p class="card-title">{{$frontend->name}}</p></a>
                  <p style="text-align:justify"  class="card-text">{!! Str::limit($frontend->short_description, 60, ' ...') !!}</p>

                </div>
              </div>
            </div>
           @endif
        @endforeach
          </div>
      </div>




      </div>


      <div class="row">
        @foreach ($frontends as $frontend)
        @if ($frontend->page_type==2)
        <div class="col-lg-4">
          <div class="info-box  mb-4">
            <i class="bx bx-phone-call"></i>
            <h3>Contact Us</h3>
            <p>{{$frontend->short_description}}</p>
          </div>
        </div>

        <div class="col-lg-8">

            {!!$frontend->description!!}



        </div>
        @endif
        @endforeach

      </div>
 {{ $frontends->links() }}
    </div>

</section><!-- End About Section -->






@endsection
