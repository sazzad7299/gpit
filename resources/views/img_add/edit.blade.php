@extends('layouts.admin_layout')


@section('page_header')
  <h4>img_add Edit</h4>  
@endsection
@section('content')
  
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                
                <form action="{{ route('img_add.update',$img_adds->id) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                  
                        <div class="form-group">
                            <label class="control-label" for="name">Link <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="link" id="link" value="{{$img_adds->link}}"/>
                            
                        </div>
            
                       
                        <div class="form-group">
                            <label class="control-label" for="name">Type <span class="m-l-5 text-danger"> *</span></label>
                            <select class="form-control" id="exampleFormControlSelect1" name="types">
                               
                                <option value="0">Vertical</option>
                               
                              </select>
                        </div>
            
                        <div class="form-group">
                            <label class="control-label" for="name">Status <span class="m-l-5 text-danger"> *</span></label>
                          
                            
                            <select class="form-control" id="exampleFormControlSelect1" name="status">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                               
                              </select>
                        </div>
            
                        <div class="form-group">
                            <img id="image" src="#" />
                              <label for="exampleInputPassword11">Photo</label>
                              <input type="file"  name="image" accept="image/*"  required onchange="readURL(this);">
                          </div>
            
                       
                     </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save img_add</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('img_add.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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

