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
                
                <form action="{{ route('author.post.update',$posts->id) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="form-group">
                    <label class="control-label" for="name">Post Title Bangla Name <span class="m-l-5 text-danger"> *</span></label>
                    <input class="form-control " type="text" name="title_bn" id="title_bn" value="{{$posts->title_bn}}"/>
                    
                </div>
    
                <div class="form-group">
                    <label class="control-label" for="name">Post Title English Name <span class="m-l-5 text-danger"> *</span></label>
                    <input class="form-control" type="text" name="title_en" id="title_en" value="{{$posts->title_en}}"/>
                    
                </div>

               
    
                <div class="form-group">
                  <label class="control-label" for="name">Category<span class="m-l-5 text-danger"> *</span></label>
                  {{-- <select class="form-control"  id="category_id" name="category_id">
                    @foreach ($categories as $category)
                   
                    <option value="{{$category->id}}">{{$category->name_en}}</option>
                    @endforeach
    
                    </select> --}}

                    <select class="form-control formselect required" placeholder="Select Category"
                    id="sub_category_name" name="category_id">
                    <option value="0" disabled selected>Select
                        Main Category*</option>
                    @foreach($categories as $categories)
                   
                    <option  value="{{ $categories->id }}">
                        {{ $categories->name_en }}</option>
                       
                    @endforeach
                </select>
               

               
              </div>
               
              <div class="form-group">
                <label class="control-label" for="name">SubCategory<span class="m-l-5 text-danger"> *</span></label>
                <select class="form-control formselect required" placeholder="Select Sub Category" id="sub_category" name="subcategory_id">
            </select>
            </div>

            <div class="form-group">
                <label class="control-label" for="name">Tages English Name <span class="m-l-5 text-danger"> *</span></label>
                <input class="form-control" type="text" name="tages_en" id="tages_en" value="{{$posts->tages_en}}"/>
                
            </div>

            <div class="form-group">
                <label class="control-label" for="name">Tages English Name <span class="m-l-5 text-danger"> *</span></label>
                <input class="form-control" type="text" name="tages_bn" id="tages_bn" value="{{$posts->tages_bn}}"/>
                
            </div>
    
                <div class="form-group">
                    <label class="control-label" for="name">Post Details English Name <span class="m-l-5 text-danger"> *</span></label>
                    <textarea class="form-control" type="text" name="details_en" id="summernote"value="{{$posts->details_bn}}" >{{ $posts->details_en }}</textarea>
                    
                </div>
    
                <div class="form-group">
                    <label class="control-label" for="name">Post Details Bangla Name <span class="m-l-5 text-danger"> *</span></label>
                    <textarea class="form-control" type="text" name="details_bn" id="summernote2" value="{{$posts->details_bn}}"> {{ $posts->details_bn }}</textarea>
                    
                </div>
    
              
               
               
               
            
    
                <div class="form-group">
                  <img id="image" src="#" />
                    <label for="exampleInputPassword11">Photo</label>
                    <input type="file"  name="image" accept="image/*"  required onchange="readURL(this);">
                </div>
               
             </div>
             <div class="modal-footer">
                <a href="{{route('author.post.index')}}" class="btn btn-secondary" data-dismiss="modal">Close
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
                url: '/author/post/create/GetSubCatAgainstMainCatEdit/' + id,
                success: function (response) {
                var response = JSON.parse(response);
                
                console.log(response);   
                $('#sub_category').empty();
                $('#sub_category').append(`<option value="0" disabled selected>Select Sub Category*</option>`);
                response.forEach(element => {
                    $('#sub_category').append(`<option value="${element['id']}">${element['name_en']}</option>`);
                    });
                }
            });
        });
    });
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

@endsection

