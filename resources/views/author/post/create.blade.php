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
                
                <form action="{{ route('author.post.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                <div class="form-group">
                    <label class="control-label" for="name">শিরোনাম লিখুন<span class="m-l-5 text-danger"> *</span></label>
                    <input class="form-control " type="text" name="title_bn" id="title_bn" value="{{old('title_bn')}}"/>
                    
                </div>
    
                

              
    
                <div class="form-group">
                  <label class="control-label" for="name">কোন ক্যাটাগরি তা সিলেক্ট করুন<span class="m-l-5 text-danger"> *</span></label>
                  {{-- <select class="form-control"  id="category_id" name="category_id">
                    @foreach ($categories as $category)
                   
                    <option value="{{$category->id}}">{{$category->name_en}}</option>
                    @endforeach
    
                    </select> --}}

                    <select class="form-control formselect required" placeholder="Select Category"
                    id="sub_category_name" name="category_id">
                    <option value="0" disabled selected>কোন ক্যাটাগরি তা সিলেক্ট করুন*</option>
                    @foreach($categories as $categories)
                   
                    <option  value="{{ $categories->id }}">
                        {{ $categories->name_bn }}</option>
                       
                    @endforeach
                </select>
              </div>
               
                
    
                <div class="form-group">
                    <label class="control-label" for="name">নিউজের বিস্তারিত লিখুন<span class="m-l-5 text-danger"> *</span></label>
                    <textarea class="form-control" type="text" name="details_bn" id="summernote2" ></textarea>
                    
                </div>
    
    
                <div class="form-group">
                  <img id="image" src="#" />
                    <label for="exampleInputPassword11">নিউজের ছবি দিন</label>
                    <input type="file"  name="image" accept="image/*"  required onchange="readURL(this);">
                </div>
               
             </div>
             <div class="modal-footer">
             <a href="{{route('author.post.index')}}" class="btn btn-secondary" >Close
                </a>
                <button type="submit" class="btn btn-primary">ক্লিক করে প্রকাশ করুন</button>
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
      placeholder: 'নিউজের বিস্তারিত লিখুন',
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
      placeholder: 'নিউজের বিস্তারিত লিখুন',
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
                url: '/author/post/create/GetSubCatAgainstMainCatEdit/' + id,
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

