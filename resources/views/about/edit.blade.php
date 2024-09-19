@extends('layouts.admin_layout')


@section('page_header')
  <h4>about Edit</h4>  
@endsection
@section('content')
  
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                
                <form action="{{ route('about.update',$abouts->id) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                        @include('partial.msg')
                        <div class="form-group">
                            <label class="control-label" for="name_bn">Name<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name_bn" value="{{ $abouts->name }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="name_en">Describtion About<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="about" id="name_en" value="{{ $abouts->about }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="name_en">Location About<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="location" id="name_en" value="{{ $abouts->location}}"/>
                            @error('name') {{ $message }} @enderror
                        </div>

                      

                        <div class="form-group">
                            <img id="image" src="#" />
                              <label for="exampleInputPassword11">favicon</label>
                              <input type="file"  name="image1" accept="image1/*" onchange="readURL(this);" value="{{ $abouts->image }}">
                          </div>
                          
                          
                            <div class="form-group">
                            <label class="control-label" for="name">Meta Box if use code<span class="m-l-5 text-danger"> *</span></label>
                            <textarea class="form-control" type="text" name="meta_box" id="tag" value="{{old('tag')}}">{{ $abouts->meta_box }}</textarea>
                            
                        </div>
          
                        <div class="form-group">
                          <label class="control-label" for="name">Image Title<span class="m-l-5 text-danger"> *</span></label>
                          <textarea class="form-control" type="text" name="image_alt" id="tag" value="{{old('tag')}}">{{ $abouts->image_alt }}</textarea>
                          
                      </div>

                    
                      
                        <div class="form-group">
                            <img id="image" src="#" />
                              <label for="exampleInputPassword11">Logo</label>
                              <input type="file"  name="image" accept="image/*" onchange="readURL(this);" value="{{ $abouts->image }}">
                          </div>
                    
            
                      
                        
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save about</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('about.edit') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script type="text/javascript">
	function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>


<script type="text/javascript">
	function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image1')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>

@endsection

