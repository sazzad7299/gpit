@extends('layouts.admin_layout')

@section('page_header')
  <h4>Website page View</h4>  
@endsection 


@section('content')
  
<div class="card">
    <div class="card-body">
        <div class="d-flex mb-3">
            <div class="d-flex align-items-center">
               
                <div class="d-inline-block">
                  
                    <div><strong>Name: </strong><strong>{{$row->name}}</strong></div>
                </div>
            </div>
            <div class="dropdown ml-auto">
                <a href="#" data-toggle="dropdown">
                    <i class="fa fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('website.edit', $row->id) }}" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a>
                    <form action="{{ route('website.destroy',$row->id) }}" method="Post">
                      @csrf
                      @method('DELETE')
                      <button class="dropdown-item" type="submit" ><i class="fa fa-trash"></i>Delete</button>
                      </form>
                </div>
            </div>
        </div>
       

        <p>page : 
            @if ($row->pages==null)
          
            @else
            {{ $row->pages->name }} 
            @endif
          </p>

  
        <p>Short Description:  {{ $row->short_description }}</p>
        
        
       
            <div class="row no-gutters border border-radius-1">
                <div class="col-3">
                    <img  src="{{asset('uploads/website/'.$row->image)}}" class="img-fluid" alt="image">

                   
                </div>
                <div class="col-9 p-3">
            

                        <h5>Details</h5>
                        <p class="mb-0">{!! $row->description !!}</p>
                        <h5>keyword</h5>
                        <p class="mb-0">{!! $row->tag !!}</p>
                    
                </div>
            </div>
       
        <div class="d-flex justify-content-between align-items-center mt-4">
          
           
        </div>
    </div>
</div>

@endsection

