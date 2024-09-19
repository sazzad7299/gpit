@extends('layouts.admin_layout')
@section('styles')
{{-- <link rel="stylesheet" href="{{url('')}}/asset/vendors/dataTable/dataTables.min.css" type="text/css"> --}}
@endsection

@section('content')
<!--begin::Card-->
<div class="card card-custom gutter-b">
  <div class="card-header flex-wrap py-3">
    <div class="card-title">
      <h3 class="card-label">All Post
    </div>
    <div class="card-toolbar">
         
      <a href="{{ route('author.post.create') }}" class="btn btn-primary pull-right">Add Post</a>
    </div>
  </div>
  <div class="card-body">
    @include('partial.msg')
    <table id="myTable" class="table table-striped table-bordered" >
  <thead>
      
    <tr>
      <th>Id</th>
      <th>Post English Title</th>
      {{-- <th>Post Bangla Title</th> --}}
      {{-- <th>Post Slug</th>
      <th>Post Slug</th> --}}


      <th>Post Category</th>
     
      <th>Post User</th>


      {{-- <th>Details English</th>
      <th>Details Bangla</th> --}}

      <th>Publish Date</th>

      <th>Status</th>
      
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach($posts as $key=>$post)
    <tr>
    <td>{{ $key+1}}</td>
     @if ($post->status == 1)
    <td> <a href="{{url('/postdetails/'.$post->id."/".$post->slug_bn)}}">{{ $post->title_bn }}</a>
    </td>  
    @else
    <td> {{ $post->title_bn }}</a>
    </td>  
    @endif
    {{-- <td>{{ $post->title_bn }}</td> --}}
    {{-- <td>{{ $post->slug_en }}</td>
    <td>{{ $post->slug_bn }}</td> --}}

    {{-- <td>{{ $post->categories->name_en }}</td> --}}
    <td>{{ $post->categories->name_bn }}</td>
   
    <td>{{ $post->users->bangla_name }}</td>

    {{-- <td>{{ $post->details_en }}</td>
    <td>{{ $post->details_bn }}</td> --}}
   
    <td>
      {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</td>

    <td>
        @if($post->status == 1) 
                                 
             <button type="submit" class="btn btn-sm btn-success" name="changeStatus" value="0">Active</button>
                                                
                         @else
                                                         
            <button type="submit" class="btn btn-sm btn-danger" name="changeStatus" value="1">Inactive</button>
                                                                              
                         @endif
    </td>

  
    
    <td class="text-center">
      
       
      

        <div class="dropdown ml-auto">
          <button href="#" data-toggle="dropdown"  class="btn btm-sm btn-success">
              <i class="fa fa-ellipsis-v"> </i>
            
          </button>
          <div class="dropdown-menu dropdown-menu-right">
              {{-- <a class="dropdown-item" href="{{ route('author.post.edit', $post->id) }}" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a> --}}
              <a  class="dropdown-item" href="{{ route('author.post.show', $post->id) }}" class="btn btn-success"><i class="fa fa-eye-slash"></i>Show</a>

              <form action="{{ route('author.post.destroy',$post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="dropdown-item" type="submit" ><i class="fa fa-trash"></i>Delete</button>
                </form>
          </div>
      </div>
     
  </td>
    </tr> 
    
     
     
    
    
    
   
    @endforeach
  
  </tbody>
</table>
  </div>
</div>
<!-- modal -->
{{-- <div class="modal fade" id="category" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="categoryLabel">Add Post</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="ti-close"></i>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('post.store') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                <label class="control-label" for="name">Post Title Bangla Name <span class="m-l-5 text-danger"> *</span></label>
                <input class="form-control " type="text" name="title_bn" id="title_bn" value="{{old('title_bn')}}"/>
                
            </div>

            <div class="form-group">
                <label class="control-label" for="name">Post Title English Name <span class="m-l-5 text-danger"> *</span></label>
                <input class="form-control" type="text" name="title_en" id="title_en" value="{{old('title_en')}}"/>
                
            </div>

            <div class="form-group">
              <label class="control-label" for="name">Status <span class="m-l-5 text-danger"> *</span></label>
            
              
              <select class="form-control" id="exampleFormControlSelect1" name="status">
                  <option value="1">Active</option>
                  <option value="0">Deactive</option>
                 
                </select>
          </div>

          <div class="form-group">
            <label class="control-label" for="name">Category<span class="m-l-5 text-danger"> *</span></label>
            <select class="form-control" id="exampleFormControlSelect1" name="category_id">
              @foreach ($categories as $category)
             
              <option value="{{$category->id}}">{{$category->name_en}}</option>
              @endforeach

              </select>
        </div>
         
        <div class="form-group">
          <label class="control-label" for="name">Category<span class="m-l-5 text-danger"> *</span></label>
          <select class="form-control" id="exampleFormControlSelect1" name="subcategory_id">
            @foreach ($subcategories as $subcategory)
           
            <option value="{{$subcategory->id}}">{{$subcategory->name_en}}</option>
            @endforeach

            </select>
      </div>
      

            <div class="form-group">
                <label class="control-label" for="name">Post Details English Name <span class="m-l-5 text-danger"> *</span></label>
                <input class="form-control" type="text" name="details_en" id="details_en" value="{{old('details_en')}}"/>
                
            </div>

            <div class="form-group">
                <label class="control-label" for="name">Post Details Bangla Name <span class="m-l-5 text-danger"> *</span></label>
                <input class="form-control" type="text" name="details_bn" id="details_bn" value="{{old('details_bn')}}"/>
                
            </div>

            <div class="form-group">
                <label class="control-label" for="name">Tages English Name <span class="m-l-5 text-danger"> *</span></label>
                <input class="form-control" type="text" name="tages_en" id="tages_en" value="{{old('tages_en')}}"/>
                
            </div>

            <div class="form-group">
                <label class="control-label" for="name">Tages English Name <span class="m-l-5 text-danger"> *</span></label>
                <input class="form-control" type="text" name="tages_bn" id="tages_bn" value="{{old('tages_bn')}}"/>
                
            </div>
           
           
           

            <div class="form-group">
              <img id="image" src="#" />
                <label for="exampleInputPassword11">Photo</label>
                <input type="file"  name="image" accept="image/*"  required onchange="readURL(this);">
            </div>
           
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
            </button>
            <button type="submit" class="btn btn-primary">Save</button>
         </div>
        </form>
       </div>
    </div>
  </div> --}}


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

{{-- 
<script src="{{url('')}}/asset/vendors/dataTable/jquery.dataTables.min.js"></script>

<!-- Bootstrap 4 and responsive compatibility -->
<script src="{{url('')}}/asset/vendors/dataTable/dataTables.bootstrap4.min.js"></script>
<script src="{{url('')}}/asset/vendors/dataTable/dataTables.responsive.min.js"></script>
<script src="{{url('')}}/asset/assets/js/examples/datatable.js"></script> --}}


   <script>
   $(document).ready(function (){
    $('#myTable').DataTable({
        "scrollY": "400px",
        "scrollCollapse": true
    });
});

  </script>
 
@endsection
