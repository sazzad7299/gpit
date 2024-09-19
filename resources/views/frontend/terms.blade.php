@extends('frontend.master')
@section('content')


    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">

      <!-- Section Title -->
      <div class="container section-title" >

        <p><span>{{$title}}</span></p>
      </div><!-- End Section Title -->

      <div class="container">
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

      </div>

    </section>

@endsection
