@extends('layouts.admin_layout')

@section('styles')
     <!-- include summernote css/js -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
 
@section('content')
  
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                @include('partial.msg')
                
                <form action="{{ route('post.update',$posts->id) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="form-group">
                    <label class="control-label" for="name">Post Title Bangla Name <span class="m-l-5 text-danger"> *</span></label>
                    <input class="form-control " type="text" name="title_bn" id="title_bn" value="{{$posts->title_bn}}"/>
                    
                </div>
    

                <div class="form-group">
                    <label class="control-label" for="name">Status <span class="m-l-5 text-danger"> *</span></label>
                  
                    
                    <select class="form-control" id="exampleFormControlSelect1" name="status">
                        <option value="1">Active</option>
                        <option value="0">Deactive</option>
                       
                      </select>
                </div>
                
                  <div class="form-group">
                    <label class="control-label" for="name">Breaking News <span class="m-l-5 text-danger"> *</span></label>
                  
                    
                    <select class="form-control" id="exampleFormControlSelect1" name="breaking">
                        <option value="1">Active</option>
                        <option value="0">Deactive</option>
                       
                      </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Status <span class="m-l-5 text-danger"> *</span></label>
                  
                    
                    <select class="form-control" id="exampleFormControlSelect1" name="thumbnail">
                        <option value="1">Big thumbnail</option>
                        <option value="0">Small thumbnail</option>
                       
                      </select>
                </div>
                <div class="form-group">
                  <label class="control-label" for="name">Category<span class="m-l-5 text-danger"> *</span></label>
                  
                    <select class="form-control formselect required" placeholder="Select Category"
                    id="sub_category_name" name="category_id">
                    <option value="0" disabled selected>Select
                        Main Category*</option>
                    @if($posts->categories==null)
                    @foreach($categories as $categories)
                    <option  value="{{ $categories->id }}">
                        {{ $categories->name_bn }}</option>
                    @endforeach
                    @else
                    @foreach($categories as $categories)
                    <option {{ $categories->id == $posts->categories->id ? 'selected' : '' }}
                         value="{{ $categories->id }}">{{ $categories->name_bn }}</option>
                    @endforeach
                    @endif
                </select>
              </div>
               
              <div class="form-group">
                <label class="control-label" for="name">SubCategory<span class="m-l-5 text-danger"> *</span></label>
                <select class="form-control formselect required" placeholder="Select Category"
                id="sub_category_name" name="subcategory_id">
                <option value="0" disabled selected>Select
                    Main Category*</option>
                    @if ($posts->subcategories==null)
                    @foreach($subcategories as $subcategories)
                    <option  value="{{ $subcategories->id }}">
                        {{ $subcategories->name_bn }}</option>
                    @endforeach
                    @else
                    @foreach($subcategories as $subcategories)
                    <option {{ $subcategories->id == $posts->subcategories->id ? 'selected' : '' }}
                         value="{{ $subcategories->id }}">{{ $subcategories->name_bn }}</option>
                    @endforeach
                    @endif
              
            </select>
            </div>

          
            <div class="form-group">
                <label class="control-label" for="name">Tages Name <span class="m-l-5 text-danger"> *</span></label>
                <input class="form-control" type="text" name="tages_bn" id="tages_bn" value="{{$posts->tages_bn}}"/>
                
            </div>
    
              
    
                <div class="form-group">
                    <label class="control-label" for="name">Visa Requirement Name<span class="m-l-5 text-danger"> *</span></label>
                    <textarea class="form-control" type="text" name="details_bn" id="summernote2" value="{{$posts->details_bn}}"> {!!$posts->details_bn !!}</textarea>
                    
                </div>

                <div class="form-group">
                  <label class="control-label" for="name">Visa Basic information <span class="m-l-5 text-danger"> *</span></label>
                  <textarea class="form-control" type="text" name="details_bn_1" id="summernote3"  value="{{$posts->details_bn_1}}"> {!!$posts->details_bn_1 !!}</textarea>
                  
              </div> 

                <div class="form-group">
                  <label class="control-label" for="name">Visa Consultancy Fee<span class="m-l-5 text-danger"> *</span></label>
                  <textarea class="form-control" type="text" name="details_bn_2" id="summernote4" value="{{$posts->details_bn_2}}"> {!!$posts->details_bn_2 !!}</textarea>
                  
              </div>
                 
        
               
               
               
            
    
                <div class="form-group">
               <img id="image" src="#" />
                <label for="exampleInputPassword11">Photo</label>
            <input type="file"  name="image" accept="image/*"   onchange="readURL(this);">
             </div>
               
             </div>
             <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save img_add</button>
              &nbsp;&nbsp;&nbsp;
              <a class="btn btn-secondary" href="{{ route('post.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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
  $('#summernote3').summernote({
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
$('#summernote4').summernote({
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

