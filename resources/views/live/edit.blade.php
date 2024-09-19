@extends('layouts.admin_layout')


@section('page_header')
  <h4>seo Edit</h4>  
@endsection
@section('content')
  
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                
                <form action="{{ route('live.update',$lives->id) }}" method="POST" role="form" >
                    @csrf
                    
                    

                        @include('partial.msg')
                        <div class="form-group">
                            <label class="control-label" for="name_bn">Facebook/Youtube Embed Link Paste<span class="m-l-5 text-danger"> *</span></label>
                            <textarea  class="form-control @error('name') is-invalid @enderror" type="text" name="live_link" id="name_bn" rows="8">{{ $lives->live_link }}</textarea>
                            @error('name') {{ $message }} @enderror
                        </div>
                        @php 
                        $live=App\Live::where('status',1)->orderBy('id','DESC')->limit(1)->get();
                        @endphp
                        <div class="form-group">
                        
                        @foreach ($live as $row)
                     
                            {!!$row->live_link!!}
                          
                          
                        @endforeach
                        </div>

                     


                      
                     

                       
                    
            
                      
                        
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save seo</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('live.edit') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

