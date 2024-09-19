@extends('layouts.admin_layout')


@section('page_header')
  <h4>setting Edit</h4>  
@endsection
@section('content')
  
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                
                <form action="{{ route('setting.update',$settings->id) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    
                   

                        @include('partial.msg')
                       

                       
                        <div class="form-group">
                            <label class="control-label" for="name_en">Address<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="address" id="name_en" value="{{ $settings->address }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>


                        <div class="form-group">
                            <label class="control-label" for="name_en">Number<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="number" id="name_en" value="{{ $settings->number }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>


                        <div class="form-group">
                            <label class="control-label" for="name_en">Email<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="email" id="name_en" value="{{ $settings->email }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>

                      
                        {{-- <div class="form-group">
                            <img id="image" src="#" />
                              <label for="exampleInputPassword11">Logo</label>
                              <input type="file"  name="image" accept="image/*"  onchange="readURL(this);">
                          </div> --}}
                    
            
                      
                        
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save setting</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('setting.edit') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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

@endsection

