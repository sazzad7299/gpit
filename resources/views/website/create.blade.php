@extends('layouts.admin_layout')

@section('styles')

    <!-- include summernote css/js -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection

@section('content')
  
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                @include('partial.msg')
                <form action="{{ route('website.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                <div class="form-group">
                    <label class="control-label" for="name">Name <span class="m-l-5 text-danger"> *</span></label>
                    <input class="form-control " type="text" name="name" id="name" value="{{old('name')}}"/>
                    
                </div>
    
               

            
                
                 


            
                <div class="form-group">
                  <label class="control-label" for="name">Page<span class="m-l-5 text-danger"> *</span></label>
                  

                    <select class="form-control formselect required" placeholder="Select Page"
                    id="sub_category_name" name="page_id">
                   
                    @foreach($pages as $page)
                    <option  value="{{ $page->id }}">
                        {{ $page->p_name }}</option>
                    @endforeach
                </select>
              </div>
               
              <div class="form-group">
                    <label class="control-label" for="name">ButtonName <span class="m-l-5 text-danger"> *</span></label>
                    <input class="form-control " type="text" name="button" id="name" value="{{old('button')}}"/>
                    
                </div>

           

            <div class="form-group">
                <label class="control-label" for="name">Short Description <span class="m-l-5 text-danger"> *</span></label>
              <textarea class="form-control" type="text" name="short_description" id="short_description" value="{{old('short_description')}}"></textarea>
                
            </div>

    
             
                
    
                <div class="form-group">
                    <label class="control-label" for="name">Long Description <span class="m-l-5 text-danger"> *</span></label>
                    <textarea class="form-control" type="text" name="description" id="summernote2"  value="{{old('description')}}"></textarea>
                    
                </div>
    
    
      <div class="form-group">
                            <label class="control-label" for="name">Meta Box if use code<span class="m-l-5 text-danger"> *</span></label>
                            <textarea class="form-control" type="text" name="meta_box" id="tag" value="{{old('tag')}}"></textarea>
                            
                        </div>
          
                        <div class="form-group">
                          <label class="control-label" for="name">Image Title<span class="m-l-5 text-danger"> *</span></label>
                          <textarea class="form-control" type="text" name="image_alt" id="tag" value="{{old('tag')}}"></textarea>
                          
                      </div>
              
               
               
                <div class="form-group">
                  <label class="control-label" for="name">Keyword (Every space generate keyword)<span class="m-l-5 text-danger"> *</span></label>
                  <textarea class="form-control" type="text" name="tag" id="tag" value="{{old('tag')}}"></textarea>
                  
              </div>
            
    
                <div class="form-group">
                  <img id="image" src="#" />
                    <label for="exampleInputPassword11">Photo</label>
                    <input type="file"  name="image" accept="image/*"  required onchange="readURL(this);">
                </div>
               
             </div>
             <div class="modal-footer">
             <a href="{{route('website.index')}}" class="btn btn-secondary" >Close
                </a>
                <button type="submit" class="btn btn-primary">Save</button>
             </div>
            </form>
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

<script>
    $('#summernote').summernote({
      placeholder: 'Hello stand alone ui',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });
  </script>

<script>
    $('#summernote2').summernote({
      placeholder: 'Hello stand alone ui',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });
  </script>



<script>
    // $("#category_id").change(function(){
    //  var category =$("#category_id").val();
    //  alert(category);
    // });

    $(document).ready(function () {
                $('#sub_category_name').on('change', function () {
                let id = $(this).val();
                $('#sub_category').empty();
                $('#sub_category').append(`<option value="0" disabled selected>Processing...</option>`);
                $.ajax({
                type: 'GET',
                url: '/admin/post/create/GetSubCatAgainstMainCatEdit/' + id,
                success: function (response) {
                var response = JSON.parse(response);
                
                console.log(response);   
                $('#sub_category').empty();
                $('#sub_category').append(`<option value="0" disabled selected>Select Sub Category*</option>`);
                response.forEach(element => {
                    $('#sub_category').append(`<option value="${element['id']}">${element['name_bn']}</option>`);
                    });
                }
            });
        });
    });
 </script>


@endsection

