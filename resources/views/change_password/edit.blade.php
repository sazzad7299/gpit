@extends('layouts.admin_layout')


@section('page_header')
  <h4>about Edit</h4>  
@endsection
@section('content')
  
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                
                <form action="{{ route('password.update',$users->id) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                   

                        @include('partial.msg')
                        <div class="form-group">
                            <label class="control-label" for="name_bn">Old password<span class="m-l-5 text-danger"> *</span></label>
                            <input type="password" id="old_password" class="form-control" placeholder="Enter your old password" name="old_password">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="name_en">Password<span class="m-l-5 text-danger"> *</span></label>
                            <input type="password" id="password" class="form-control" placeholder="Enter your new password" name="password">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="name_en">Confirm Password<span class="m-l-5 text-danger"> *</span></label>
                            <input type="password" id="confirm_password" class="form-control" placeholder="Enter your new password again" name="password_confirmation">
                        </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('password.change') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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

