@extends('layouts.admin_layout')

@section('page_header')
  <h4>Post View</h4>  
@endsection 


@section('content')
  
<div class="card">
    <div class="card-body">
        <div class="d-flex mb-3">
            <div class="d-flex align-items-center">
               
                <div class="d-inline-block">
                    <div><strong>Bangla Title: </strong><strong>{{ $post->title_bn }}</strong></div>
                    <div><strong>Author: </strong><strong>{{ $post->users->bangla_name }}</strong></div>
                    <small class="text-muted">{{ \Carbon\Carbon::parse($post->published_date)->diffForHumans() }}</small>
                </div>
            </div>
            <div class="dropdown ml-auto">
                <a href="#" data-toggle="dropdown">
                    <i class="fa fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    {{-- <a class="dropdown-item" href="{{ route('author.post.edit', $post->id) }}" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a> --}}
                    <form action="{{ route('author.post.destroy',$post->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="dropdown-item" type="submit" ><i class="fa fa-trash"></i>Delete</button>
                      </form>
                </div>
            </div>
        </div>
       

        <p>Category Bangla: {{ $post->categories->name_bn }}</p>

     
        

       
        
        
       
            <div class="row no-gutters border border-radius-1">
                <div class="col-3">
                    <img  src="{{asset('uploads/post/'.$post->image)}}" class="img-fluid" alt="image">

                   
                </div>
                <div class="col-9 p-3">
                    <h5>Einglish Details</h5>
                    <p class="mb-0"> {!! $post->details_bn !!}</p>
            
                       
                </div>
            </div>
       
        <div class="d-flex justify-content-between align-items-center mt-4">
          
           
        </div>
    </div>
</div>

@endsection

