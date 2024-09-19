@extends('layouts.admin_layout')


@section('page_header')
  <h4>Page Edit</h4>  
@endsection
@section('content')
  
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                
                <form action="{{ route('page.update',$rows->id) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                        <div class="form-group">
                            <label class="control-label" for="name_bn">Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="p_name" id="name_bn" value="{{ $rows->p_name }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                          <label class="control-label" for="name_bn">Page Description <span class="m-l-5 text-danger"> *</span></label>
                          <input class="form-control @error('name') is-invalid @enderror" type="text" name="page_description" id="name_bn" value="{{ $rows->page_description }}"/>
                          @error('name') {{ $message }} @enderror
                      </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Header Show <span class="m-l-5 text-danger"> *</span></label>
                          
                            
                          <select class="form-control" id="exampleFormControlSelect1" name="header_show">
                            <option value="1">Show</option>
                            <option value="0">Hide</option>
                           
                          </select>
                          </div>


                          <div class="form-group">
                            <label class="control-label" for="name">Page Type<span class="m-l-5 text-danger"> *</span></label>
                          
                            
                          <select class="form-control" id="exampleFormControlSelect1" name="page_type">
                            <option value="1">Group</option>
                            <option value="0">Single</option>
                            <option value="2">location</option>
                           
                          </select>
                          </div>


              
                          <div class="form-group">
                            <label class="control-label" for="name">Menu Show List <span class="m-l-5 text-danger"> *</span></label>
                          
                            
                          <select class="form-control" id="exampleFormControlSelect1" name="page_number">
                            <option value="1">First</option>
                            <option value="2">Second</option>
                            <option value="3">Third</option>
                            <option value="4">four</option>
                            <option value="5">five</option>
                            <option value="6">six</option>
                            <option value="7">seven</option>
                            <option value="10">None</option>
                           
                          </select>
                          </div>
                    
                       
            
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Category</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('page.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

