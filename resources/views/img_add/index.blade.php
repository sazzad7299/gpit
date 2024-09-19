@extends('layouts.admin_layout')

@section('styles')
{{-- <link rel="stylesheet" href="{{url('')}}/asset/vendors/dataTable/dataTables.min.css" type="text/css"> --}}
@endsection


@section('content')


<!--begin::Card-->
<div class="card card-custom gutter-b">
  <div class="card-header flex-wrap py-3">
    <div class="card-title">
      <h3 class="card-label">Add Category
    </div>
    <div class="card-toolbar">
         
      <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#img_add">
        Add Category
      </button>
    </div>
  </div>
  <div class="card-body">
    <!--begin: Datatable-->


    <table id="myTable" class="table table-striped table-bordered" >
  <thead>
      @include('partial.msg')
    <tr>
      <th>Id</th>
      <th>LINK</th>
      <th>Image</th>
      <th>Type</th>
      
      <th>Status</th>
      
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach($img_adds as $key=>$img_add)
    <tr>
    <td>{{ $key+1}}</td>
    <td>{{ $img_add->link }}</td>
    <td>
      <img  src="{{asset('uploads/img_add/'.$img_add->image)}}" class="img-thumbnail" width="100" height="100" alt="avatar">
  </td>
    
    <td>
        @if($img_add->types == 1) 
                                 
             <button type="submit" class="btn btn-sm btn-success" name="changeStatus" value="0">Horizontal</button>
                                                
                         @else
                                                         
            <button type="submit" class="btn btn-sm btn-danger" name="changeStatus" value="1">Vertical</button>
                                                                              
                         @endif
    </td>
    
    <td>
        @if($img_add->status == 1) 
                                 
             <button type="submit" class="btn btn-sm btn-success" name="changeStatus" value="0">Active</button>
                                                
                         @else
                                                         
            <button type="submit" class="btn btn-sm btn-danger" name="changeStatus" value="1"> Inactive</button>
                                                                              
                         @endif
    </td>

  
    
    <td class="text-center">
            <div class="btn-group" role="group" aria-label="Second group">
            
                <a href="{{ route('img_add.edit', $img_add->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
            </div>
                <div class="btn-group" role="group" aria-label="Second group">
                  <button class="btn btn-danger" type="button" onclick="deleteimg_add({{ $img_add->id }})">
                    <i class="fa fa-trash"></i>
                  </button>
                  <form id="delete-form-{{ $img_add->id }}" action="{{ route('img_add.destroy',$img_add->id) }}" method="POST" >
                      @csrf
                      @method('DELETE')
                  </form>
            </div>

          
        </td>


        
    </tr> 
    
     
     
    
    
    
   
    @endforeach
    ...
  </tbody>
</table>
 
<!-- modal -->
<div class="modal fade" id="img_add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="img_addLabel">Add img_add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="ti-close"></i>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('img_add.store') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                <label class="control-label" for="name">Link <span class="m-l-5 text-danger"> *</span></label>
                <input class="form-control " type="text" name="link" id="link" value="{{old('link')}}"/>
                
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
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
            </button>
            <button type="submit" class="btn btn-primary">Save</button>
         </div>
        </form>
       </div>
    </div>
  </div>


@endsection


@section('scripts')

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
    
<script type="text/javascript">
  function deleteimg_add(id) {
      swal({
        title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
          
      }).then((result) => {
        if (result) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
      })
  }
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


@endsection


