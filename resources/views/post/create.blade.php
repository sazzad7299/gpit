@extends('layouts.admin_layout')

@section('styles')

<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection

@section('content')
  
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                @include('partial.msg')
                <form action="{{ route('post.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                <div class="form-group">
                    <label class="control-label" for="name">Title<span class="m-l-5 text-danger"> *</span></label>
                    <input class="form-control " type="text" name="title_bn" id="title_bn" value="{{old('title_bn')}}" required/>
                    
                </div>
    
               

                <div class="form-group">
                    <label class="control-label" for="name">Status <span class="m-l-5 text-danger"> *</span></label>
                  
                    
                    <select class="form-control" id="exampleFormControlSelect1" name="status" required>
                        <option value="1">Active</option>
                        <option value="0">Deactive</option>
                       
                      </select>
                </div>
                
                  
    
                <div class="form-group">
                  <label class="control-label" for="name">Country<span class="m-l-5 text-danger"> *</span></label>
                  

                    <select class="form-control formselect required" placeholder="Select Category"
                    id="sub_category_name" name="category_id" required>
                    <option value="0" disabled selected>Select
                        Main Country*</option>
                    @foreach($categories as $categories)
                    <option  value="{{ $categories->id }}">
                        {{ $categories->name_bn }}</option>
                    @endforeach
                </select>
              </div>
               
              <div class="form-group">
                <label class="control-label" for="name">VisaCategory<span class="m-l-5 text-danger"> *</span></label>
                <select class="form-control formselect required" placeholder="Select Category"
                    id="sub_category_name" name="subcategory_id" required>
                    <option value="0" disabled selected>Select
                        Main Country*</option>
                    @foreach($subcategories as $subcategories)
                    <option  value="{{ $subcategories->id }}">
                        {{ $subcategories->name_bn }}</option>
                    @endforeach
                </select>
            </div>

           

           
             
                
    
                <div class="form-group">
                    <label class="control-label" for="name">Visa Requirement Name <span class="m-l-5 text-danger"> *</span></label>
                    <textarea class="form-control" type="text" name="details_bn" id="summernote2"  value="{{old('details_bn')}}" required></textarea>
                    
                </div>
    
                <div class="form-group">
                  <label class="control-label" for="name">Visa Basic information <span class="m-l-5 text-danger"> *</span></label>
                  <textarea class="form-control" type="text" name="details_bn_1" id="summernote3"  value="{{old('details_bn')}}" required></textarea>
                  
              </div>

              <div class="form-group">
                <label class="control-label" for="name">Visa Consultancy Fee<span class="m-l-5 text-danger"> *</span></label>
                <textarea class="form-control" type="text" name="details_bn_2" id="summernote4"  value="{{old('details_bn')}}" required></textarea>
                
            </div>
               
               
            <div class="form-group">
              <label class="control-label" for="name">Keyword Name <span class="m-l-5 text-danger"> *</span></label>
            <textarea class="form-control" type="text" name="tages_bn" id="tages_bn" value="{{old('tages_bn')}}" required> </textarea>
              
          </div>
  
            
    
                <div class="form-group">
                  <img id="image" src="#" />
                    <label for="exampleInputPassword11">Photo</label>
                    <input type="file"  name="image" accept="image/*"  required onchange="readURL(this);">
                </div>
               
             </div>
             <div class="modal-footer">
             <a href="{{route('post.index')}}" class="btn btn-secondary" >Close
                </a>
                <button type="submit" class="btn btn-primary">Save</button>
             </div>
            </form>
            </div>
        </div>
    

@endsection

@section('scripts')

<script>
 
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

