@section('meta_box')
{!!$post->meta_box!!}
@endsection
@extends('frontend.master')

@section('content')

<!-- Modal -->
<div class="modal fade contact" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="rt-form" method="POST" action="{{ route('apply.store') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header primary-background">
                    <h5 class="modal-title" id="exampleModalLabel">We will contact soon, Fill Now</h5>
                    <button type="button" class="btn-close btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body secondary-background">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control pill rt-mb-15" placeholder="Enter your full name" name="a_name" required>

                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Number:</label>
                        <input type="text" class="form-control pill rt-mb-15" placeholder="Enter your phone number" name="a_number" required>
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Email:</label>
                        <input type="text" class="form-control pill rt-mb-15" placeholder="Enter your email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Company Name:</label>
                        <input type="text" class="form-control pill rt-mb-15" placeholder="Enter Company Name" name="company" required>
                    </div>
                    @if($sposts->page_id == 76)
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Select course attendance type:</label> <br>
                        <input type="radio"  name="attendance_type" value="offline">
                        <label for="offline">Offline</label>
                        <input type="radio"name="attendance_type" value="online">
                        <label for="Online">Online</label>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">How to find us?</label>
                        <select name="find_throw" class="form-control pill rt-mb-15" required>
                            <option value="Google">Google</option>
                            <option value="Bing">Bing</option>
                            <option value="Facebook">Facebook</option>
                            <option value="Linkedin">Linkedin</option>
                            <option value="Youtube">Youtube</option>
                            <option value="Instagram">Instagram</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">City:</label>
                        <select name="city" class="form-control pill rt-mb-15" required>
                            <option value="Bagerhat">Bagerhat</option>
                            <option value="Bandarban">Bandarban</option>
                            <option value="Barguna">Barguna</option>
                            <option value="Barisal">Barisal</option>
                            <option value="Bhola">Bhola</option>
                            <option value="Bogra">Bogra</option>
                            <option value="Brahmanbaria">Brahmanbaria</option>
                            <option value="Chandpur">Chandpur</option>
                            <option value="Chapai Nawabganj">Chapai Nawabganj</option>
                            <option value="Chattogram">Chattogram</option>
                            <option value="Chuadanga">Chuadanga</option>
                            <option value="Comilla">Comilla</option>
                            <option value="Cox's Bazar">Cox's Bazar</option>
                            <option value="Dhaka" selected>Dhaka</option>
                            <option value="Dinajpur">Dinajpur</option>
                            <option value="Faridpur">Faridpur</option>
                            <option value="Feni">Feni</option>
                            <option value="Gaibandha">Gaibandha</option>
                            <option value="Gazipur">Gazipur</option>
                            <option value="Gopalganj">Gopalganj</option>
                            <option value="Habiganj">Habiganj</option>
                            <option value="Jamalpur">Jamalpur</option>
                            <option value="Jashore">Jashore</option>
                            <option value="Jhalokathi">Jhalokathi</option>
                            <option value="Jhenaidah">Jhenaidah</option>
                            <option value="Joypurhat">Joypurhat</option>
                            <option value="Khagrachari">Khagrachari</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Kishoreganj">Kishoreganj</option>
                            <option value="Kurigram">Kurigram</option>
                            <option value="Kushtia">Kushtia</option>
                            <option value="Lakshmipur">Lakshmipur</option>
                            <option value="Lalmonirhat">Lalmonirhat</option>
                            <option value="Madaripur">Madaripur</option>
                            <option value="Magura">Magura</option>
                            <option value="Manikganj">Manikganj</option>
                            <option value="Meherpur">Meherpur</option>
                            <option value="Moulvibazar">Moulvibazar</option>
                            <option value="Munshiganj">Munshiganj</option>
                            <option value="Mymensingh">Mymensingh</option>
                            <option value="Naogaon">Naogaon</option>
                            <option value="Narail">Narail</option>
                            <option value="Narayanganj">Narayanganj</option>
                            <option value="Narsingdi">Narsingdi</option>
                            <option value="Natore">Natore</option>
                            <option value="Netrokona">Netrokona</option>
                            <option value="Nilphamari">Nilphamari</option>
                            <option value="Noakhali">Noakhali</option>
                            <option value="Pabna">Pabna</option>
                            <option value="Panchagarh">Panchagarh</option>
                            <option value="Patuakhali">Patuakhali</option>
                            <option value="Pirojpur">Pirojpur</option>
                            <option value="Rajbari">Rajbari</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Rangamati">Rangamati</option>
                            <option value="Rangpur">Rangpur</option>
                            <option value="Satkhira">Satkhira</option>
                            <option value="Shariatpur">Shariatpur</option>
                            <option value="Sherpur">Sherpur</option>
                            <option value="Sirajganj">Sirajganj</option>
                            <option value="Sunamganj">Sunamganj</option>
                            <option value="Sylhet">Sylhet</option>
                            <option value="Tangail">Tangail</option>
                            <option value="Thakurgaon">Thakurgaon</option>
                        </select>

                    </div>
                    <input type="hidden" class="form-control pill rt-mb-15" placeholder="Number" name="a_country" value="{{ $sposts->name}}">
                </div>
                <div class="modal-footer primary-background">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-exclusive">Submit</button>
                </div>
            </div>
        </form>

    </div>
</div>
<div class="container-fluid">
    <div class="row page-header">
        <div class="d-flex flex-column justify-content-center text-light"  style="background-image:url({{asset('frontend/images/pageheader.webp')}});background-size:cover;min-height:250px;text-align:center;color:#ffffff">
            <h1 class="text-light">{{$sposts->name}}</h1>

        </div>
    </div>
</div>
@php

@endphp
<section>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('uploads/website/' . $sposts->image) }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-center">
                        <div class="about-content ps-0 ps-lg-3">
                            <p>{!! $sposts->short_description !!}</p>
                            @if ($sposts->button!=null)
                            <div class="col-md-3">
                                <button type="button" class="btn btn-primary btn-exclusive" data-bs-toggle="modal" data-bs-target="#exampleModal">{{$sposts->button}}</button>

                            </div>
                            @endif
                        </div>
                    </div>
                    <hr style="height: 5px; background-color: #000; border: none; margin-top:20px">
                    <div class="card-content">
                    {!!$sposts->description!!}
                </div>
                </div>
            </div>
        </div>
    <div class="d-flex justify-content-center" style="margin-top:50px">
        <a href="{{ url('/get-free-quate') }}" class="btn btn-primary free_quate_button" >Get A Free Quate <i class="bi bi-arrow-right"></i></a>
    </div>
    </div>
</section>
@endsection
