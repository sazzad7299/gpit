@extends('layouts.admin_layout')
@section('styles')

@endsection


@section('content')


<!--begin::Card-->
<div class="card card-custom gutter-b">
  <div class="card-header flex-wrap py-3">
    <div class="card-title">
      <h3 class="card-label">All Post
    </div>
    <div class="card-toolbar">
         
      <a href="{{ route('post.create') }}" class="btn btn-primary pull-right">Add Post</a>
    </div>
  </div>
  <div class="card-body">





    <form class="mb-15">
        <div class="row mb-6">
            <div class="col-lg-3 mb-lg-0 mb-6">
                <label>RecordID:</label>
                <input type="text" class="form-control datatable-input" placeholder="E.g: 4590" data-col-index="0" />
            </div>
            <div class="col-lg-3 mb-lg-0 mb-6">
                <label>OrderID:</label>
                <input type="text" class="form-control datatable-input" placeholder="E.g: 37000-300" data-col-index="1" />
            </div>
            <div class="col-lg-3 mb-lg-0 mb-6">
                <label>Country:</label>
                <select class="form-control datatable-input" data-col-index="2">
                    <option value="">Select</option>
                </select>
            </div>
            <div class="col-lg-3 mb-lg-0 mb-6">
                <label>Agent:</label>
                <input type="text" class="form-control datatable-input" placeholder="Agent ID or name" data-col-index="4" />
            </div>
        </div>
        <div class="row mb-8">
            <div class="col-lg-3 mb-lg-0 mb-6">
                <label>Ship Date:</label>
                <div class="input-daterange input-group" id="kt_datepicker">
                    <input type="text" class="form-control datatable-input" name="start" placeholder="From" data-col-index="5" />
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="la la-ellipsis-h"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control datatable-input" name="end" placeholder="To" data-col-index="5" />
                </div>
            </div>
            <div class="col-lg-3 mb-lg-0 mb-6">
                <label>Status:</label>
                <select class="form-control datatable-input" data-col-index="6">
                    <option value="">Select</option>
                </select>
            </div>
            <div class="col-lg-3 mb-lg-0 mb-6">
                <label>Type:</label>
                <select class="form-control datatable-input" data-col-index="7">
                    <option value="">Select</option>
                </select>
            </div>
        </div>
        <div class="row mt-8">
            <div class="col-lg-12">
            <button class="btn btn-primary btn-primary--icon" id="kt_search">
                <span>
                    <i class="la la-search"></i>
                    <span>Search</span>
                </span>
            </button>&#160;&#160; 
            <button class="btn btn-secondary btn-secondary--icon" id="kt_reset">
                <span>
                    <i class="la la-close"></i>
                    <span>Reset</span>
                </span>
            </button></div>
        </div>
    </form>








    <table id="myTable" class="table table-striped table-bordered" >
  <thead>
      @include('partial.msg')
    <tr>
      <th>Id</th>
      <th>Post English Title</th>
      {{-- <th>Post Bangla Title</th> --}}
      {{-- <th>Post Slug</th>
      <th>Post Slug</th> --}}


      <th>Post Category</th>
      <th>Post SubCategory</th>
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
    <td>{{ $post->title_en }}</td>
    {{-- <td>{{ $post->title_bn }}</td> --}}
    {{-- <td>{{ $post->slug_en }}</td>
    <td>{{ $post->slug_bn }}</td> --}}

    <td>{{ $post->categories->name_en }}</td>
    <td>{{ $post->subcategories->name_en }}</td>
    <td>{{ $post->users->english_name }}</td>

    {{-- <td>{{ $post->details_en }}</td>
    <td>{{ $post->details_bn }}</td> --}}
   
    <td>
      {{ \Carbon\Carbon::parse($post->published_date)->diffForHumans() }}</td>

    <td>
        @if($post->status == 1) 
                                 
             <a href="{{ route('post.act', $post->id) }}" class="btn btn-sm btn-success" name="changeStatus" value="0">Active</a>
                                                
                         @else
                                                         
            <a href="{{ route('post.det', $post->id) }}" class="btn btn-sm btn-danger" name="changeStatus" value="1">Inactive</a>
                                                                              
                         @endif
    </td>

  
    
    <td class="text-center">
      
       
      

        <div class="dropdown ml-auto">
          <button href="#" data-toggle="dropdown"  class="btn btm-sm btn-success">
              <i class="fa fa-ellipsis-v"> </i>
            
          </button>
          <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="{{ route('post.edit', $post->id) }}" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a>
              <a  class="dropdown-item" href="{{ route('post.show', $post->id) }}" class="btn btn-success"><i class="fa fa-eye-slash"></i>Show</a>

              <form action="{{ route('post.destroy',$post->id) }}" method="POST">
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
 
 <!--end: Datatable-->
</div>
</div>
<!--end::Card-->


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


{{-- <script src="{{url('')}}/asset/vendors/dataTable/jquery.dataTables.min.js"></script>

<!-- Bootstrap 4 and responsive compatibility -->
<script src="{{url('')}}/asset/vendors/dataTable/dataTables.bootstrap4.min.js"></script>
<script src="{{url('')}}/asset/vendors/dataTable/dataTables.responsive.min.js"></script>
<script src="{{url('')}}/asset/assets/js/examples/datatable.js"></script>
 --}}

   <script>
   $(document).ready(function (){
    $('#myTable').DataTable({
        "scrollY": "400px",
        "scrollCollapse": true
    });
});

  </script>
 
 </s
@endsection
