@extends('layouts.admin_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('authoer dashboard!') }}
                </div>
            </div>
        </div> --}}

        <div class="card text-white bg-info" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">নিউজ লিখুন</h5>
              <p class="card-text">নিউজ লেখার সময় শিরোনামটির দিকে বিশেষ গুরত্ব দিন</p>
              <a href="{{ route('author.post.create') }}" class="btn btn-success">ক্লিক করে নিউজ  লিখার পেইজে যান</a>
            </div>
          </div>
          <div class="card text-white bg-warning" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">আপনার প্রকাশিত নিউজ</h5>
              <p class="card-text">যে নিউজ দেখে নগর টিভি কর্তৃপক্ষ সন্তুষ্ট</p>
              <a href="{{route('author.post.index')}}" class="btn btn-success">ক্লিক করে আপনার প্রকাশিত নিউজ দেখন</a>
            </div>
          </div>
          <div class="card text-white bg-danger" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">আপনার যে নিউজ প্রকাশিত হয় নাই</h5>
              <p class="card-text">যে নিউজ দেখে নগর টিভি কর্তৃপক্ষ সন্তুষ্ট নয় অথবা এখনো চেক করে নাই</p>
              <a href="{{route('author.deactivepost')}}" class="btn btn-success">ক্লিক করে আপনার যে নিউজ প্রকাশিত হয় নাই</a>
            </div>
          </div>

          <div class="card text-white bg-danger" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">আপনার একাউন্ট লগ আউট করুন</h5>
              <p class="card-text">আপনার পার্সওডার মনে রাখুন</p>
              <a href="{{ route('logout')}}" class="btn btn-success" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();" >ক্লিক করে আপনার আকাউন্ট লগ আউট করুন </a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
          </div>
    </div>
</div>
@endsection
