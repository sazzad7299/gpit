@extends('layouts.admin_layout')


@section('page_header')
  <h4>program Edit</h4>  
@endsection
@section('content')
  
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                
                <form action="{{ route('program.update',$programs->id) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                        <div class="form-group">
                            <label class="control-label" for="name_bn">Bangla Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name_bn" id="name_bn" value="{{ $programs->name_bn }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="name">Program Category<span class="m-l-5 text-danger"> *</span></label>
                            <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                              @foreach ($categories as $category)
                             
                              <option value="{{$category->id}}">{{$category->name_bn}}</option>
                              @endforeach
              
                              </select>
                        </div>
                       
                        <div class="form-group">
                            <label class="control-label" for="name">Video Link <span class="m-l-5 text-danger"> *</span></label>
                            <textarea class="form-control " type="text" name="program_video" id="name_bn" />{{$programs->program_video}}</textarea> 
                        </div>
            
                        <div class="form-group">
                            <label class="control-label" for="name">Status <span class="m-l-5 text-danger"> *</span></label>
                          
                            
                            <select class="form-control" id="exampleFormControlSelect1" name="status">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                               
                              </select>
                        </div>
                        
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save program</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('program.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

