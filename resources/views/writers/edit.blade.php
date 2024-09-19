@extends('layouts.admin_layout')



@section('page_header')
  <h4>Writer Edit</h4>  
@endsection 
@section('content')
  
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                
                <form action="{{ route('writer.update',$writers->id) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                  
                        @include('partial.msg')
                        <div class="form-group">
                            <label class="control-label" for="bangla_name">Writer Bangla Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control" type="text" name="bangla_name" id="bangla_name" value="{{ $writers->bangla_name }}"/>
                            
                        </div>
                  
                  

                        <div class="form-group">
                            <label class="control-label" for="name">Email <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control" type="email" name="email" id="email"value="{{ $writers->email }}"/>
                           
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="password">Password <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control" type="password" name="password" id="password" value="{{ old('password') }}"/>
                           
                        </div>
                        @php
                        $designation=App\Designation::where('status',1)->get();
                        @endphp
                        <div class="form-group">
                            <label class="control-label" for="category_name">designation name <span class="m-l-5 text-danger"> *</span></label>
                            <select name="designation" id="category_name" class="form-control">
                                @foreach ($designation as $row)
                     
                                <option value="{{$row->id}}">{{$row->name_bn}}</option>
                                @endforeach
                
                            </select>

                        </div>

                        
                       
                        <div class="form-group">
                            <label class="control-label" for="name">Status <span class="m-l-5 text-danger"> *</span></label>
                          
                            
                            <select class="form-control" id="exampleFormControlSelect1" name="status">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                               
                              </select>
                        </div>
            
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Category</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('writer.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

