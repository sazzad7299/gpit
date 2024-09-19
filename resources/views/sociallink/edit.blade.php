@extends('layouts.admin_layout')


@section('page_header')
  <h4>sociallink Edit</h4>  
@endsection
@section('content')
  
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                
                <form action="{{ route('sociallink.update',$sociallinks->id) }}" method="POST" role="form" >
                    @csrf
                    
                 

                        @include('partial.msg')
                        <div class="form-group">
                            <label class="control-label" for="name_bn">Facebook<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="fb" id="name_bn" value="{{ $sociallinks->fb }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="name_en">Twitter <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="twi" id="name_en" value="{{ $sociallinks->twi }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="name_en">Instagram <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="insta" id="name_en" value="{{ $sociallinks->insta }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>


                        <div class="form-group">
                            <label class="control-label" for="name_en">Youtube <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="yout" id="name_en" value="{{ $sociallinks->yout }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>


                        <div class="form-group">
                            <label class="control-label" for="name_en">Videmo <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="vid" id="name_en" value="{{ $sociallinks->vid }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="name_en">Fliever <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="fli" id="name_en" value="{{ $sociallinks->fli }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>
                       
                    
            
                      
                        
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save sociallink</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('sociallink.edit') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

