@section('meta_box')
@endsection
@extends('frontend.master')

@section('content')

<div class="container-fluid">
    <div class="row page-header">
        <div class="d-flex flex-column justify-content-center text-light" data-aos="zoom-out" style="background-image:url({{asset('frontend/images/pageheader.webp')}});background-size:cover;min-height:250px;text-align:center;color:#ffffff">
            <h1 class="text-light"> Get A Free Quate</h1>
        </div>
    </div>
</div>
@php

@endphp
<section>
    <div class="container">
            <!-- Contact Section -->
    <section id="contact" class="contact section">

<!-- Section Title -->
<div class="container section-title" >
  <p><span>Need Help?</span> <span class="description-title">Get A Free Quate</span></p>
</div><!-- End Section Title -->

<div class="container" >

  <div class="row gy-4">

    <div class="col-md-12">
      <form action="{{ route('email.store') }}" method="POST" role="form"  class="php-email-form" >
          @csrf
        <div class="row gy-4">

          <div class="col-md-12">
            <label for="name-field" class="pb-2">Your Name</label>
            <input type="text" name="name" id="name-field" class="form-control" required="">
          </div>
          <div class="col-md-6">
            <label for="phone-field" class="pb-2">Phone</label>
            <input type="number" class="form-control" name="phone" id="phone-field" required="">
          </div>

          <div class="col-md-6">
            <label for="email-field" class="pb-2">Your Email</label>
            <input type="email" class="form-control" name="email" id="email-field" required="">
          </div>
          <div class="col-md-4">
            <label for="email-field" class="pb-2">Your Company Name</label>
            <input type="text" class="form-control" name="company_name" id="company_named" required="">
          </div>
          <div class="col-md-4">
            <label for="subject-field" class="pb-2">Name of Service/Project/Course</label>
            <input type="text" class="form-control" name="subject" id="subject-field" required="">
          </div>
          <div class="col-md-4">
            <label for="dateInput-field" class="pb-2">Booking Date</label>
            <input type="date" class="form-control" name="date" id="dateInput-field" required="">
          </div>



          <div class="col-md-12">
            <label for="message-field" class="pb-2">Inquery Details</label>
            <textarea class="form-control" name="message" rows="10" id="message-field" ></textarea>
          </div>

          <div class="col-md-12 text-center">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>

            <!-- <button type="submit">Send Message</button> -->
            <input type="submit" value="Send Inquery">
          </div>

        </div>
      </form>
    </div><!-- End Contact Form -->

  </div>

</div>

</section><!-- /Contact Section -->
    </div>
</section>
@endsection
@push('js')
<script>
    // Get today's date
    var today = new Date();
    // Format the date as yyyy-mm-dd
    var formattedDate = today.toISOString().split('T')[0];
    // Set the value of the date input field to today's date
    document.getElementById('dateInput-field').value = formattedDate;
</script>
@endpush
