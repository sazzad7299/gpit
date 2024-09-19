@extends('layouts.admin_layout')


@section('page_header')
  <h4>seo Edit</h4>  
@endsection
@section('content')
  
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                
                <form action="{{ route('seo.update',$seos->id) }}" method="POST" role="form" >
                    @csrf
                    
                    

                        @include('partial.msg')
                        <div class="form-group">
                            <label class="control-label" for="name_bn">Meta Title<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="meta_title" id="name_bn" value="{{ $seos->meta_title }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="name_en">Meta Tag <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="meta_tag" id="name_en" value="{{ $seos->meta_tag }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="name_en">Meta Description <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="meta_des" id="name_en" value="{{ $seos->meta_des }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>


                        <div class="form-group">
                            <label class="control-label" for="name_en">Meta Author <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="meta_author" id="name_en" value="{{ $seos->meta_author }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>


                        <div class="form-group">
                            <label class="control-label" for="name_en">Google Analyies <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="google_analyies" id="name_en" value="{{ $seos->google_analyies }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="name_en">Google Verification <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="google_verification" id="name_en" value="{{ $seos->google_verification }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="name_en">Bing Verification <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="bing_verification" id="name_en" value="{{ $seos->alexa_analyties }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="name_en">Alexa Analyties <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="alexa_analyties" id="name_en" value="{{ $seos->alexa_analyties }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>
                        
                        
                          <div class="form-group">
                            <label class="control-label" for="name">Meta Box if use code<span class="m-l-5 text-danger"> *</span></label>
                            <textarea class="form-control" type="text" name="meta_box" id="tag" value="{{old('tag')}}">{{ $seos->meta_box }}</textarea>
                            
                        </div>
          
                        <div class="form-group">
                          <label class="control-label" for="name">Image Title<span class="m-l-5 text-danger"> *</span></label>
                          <textarea class="form-control" type="text" name="image_alt" id="tag" value="{{old('tag')}}">{{ $seos->image_alt }}</textarea>
                          
                      </div>


                        <div class="form-group">
                            <label class="control-label" for="name_en">Keyword<span class="m-l-5 text-danger"> *</span></label>
                            <textarea class="form-control @error('name') is-invalid @enderror" type="text" name="keyword" id="name_en">{{ $seos->keyword }}</textarea>
                            @error('name') {{ $message }} @enderror
                        </div>


                       
                    
            
                      
                        
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save seo</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('seo.edit') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

