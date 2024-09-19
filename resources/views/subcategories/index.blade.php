@extends('layouts.admin_layout')
@section('styles')
{{-- <link rel="stylesheet" href="{{url('')}}/asset/vendors/dataTable/dataTables.min.css" type="text/css"> --}}
@endsection


@section('content')

<div class="card card-custom gutter-b">
  <div class="card-header flex-wrap py-3">
    <div class="card-title">
      <h3 class="card-label">Add VisaCategory
    </div>
    <div class="card-toolbar">
         
      <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#category">
        Add VisaCategory
      </button>
    </div>
  </div>
  <div class="card-body">
    <table id="myTable" class="table table-striped table-bordered">
  <thead>
    @include('partial.msg')
    <tr>
      <th>Id</th>
      <th>VisaCategory Name</th>
     
     
      
     
      <th>Status</th>
      <th>Show_on_header</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach($subcategories as  $key=>$subcategory)
    <tr>
    <td>{{ $key+1 }}</td>
   
    <td>{{ $subcategory->name_bn }}</td>
   

    <td>
      @if($subcategory->status == 1) 
                               
           <button type="submit" class="btn btn-sm btn-success" name="changeStatus" value="0">Active</button>
                                              
                       @else
                                                       
          <button type="submit" class="btn btn-sm btn-danger" name="changeStatus" value="1">Inactive</button>
                                                                            
                       @endif
  </td>
    
    <td>@if($subcategory->show_on_header == 1) 
                                 
                                 <button type="submit" class="btn btn-sm btn-success" name="changeStatus" value="0">Active</button>
                                                
                         @else
                                                         
                                 <button type="submit" class="btn btn-sm btn-danger" name="changeStatus" value="1">Inactive</button>
                                                                              
                         @endif</td>
    
                         <td class="text-center">
                          <div class="btn-group" role="group" aria-label="Second group">
                          
                              <a href="{{ route('subcategory.edit', $subcategory->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                          </div>
                              <div class="btn-group" role="group" aria-label="Second group">
                                <button class="btn btn-danger" type="button" onclick="deletesubcategory({{ $subcategory->id }})">
                                  <i class="fa fa-trash"></i>
                                </button>
                                <form id="delete-form-{{ $subcategory->id }}" action="{{ route('subcategory.destroy',$subcategory->id) }}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                </form>
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

<div class="modal fade" id="category" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="categoryLabel">Add  VisaCategory</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="ti-close"></i>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('subcategory.store') }}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="control-label" for="name">Name <span class="m-l-5 text-danger"> *</span></label>
                <input class="form-control " type="text" name="name_bn" id="name_bn" value="{{old('name_bn')}}"/>
                
            </div>

          

          
           
            <div class="form-group">
                <label class="control-label" for="name">show_on_header<span class="m-l-5 text-danger"> *</span></label>
                

                  <select class="form-control" id="exampleFormControlSelect1" name="show_on_header">
                    <option value="1">Show</option>
                    <option value="0">Hide</option>
                   
                  </select>
            </div>

            <div class="form-group">
                <label class="control-label" for="name">Status <span class="m-l-5 text-danger"> *</span></label>
              
                
                <select class="form-control" id="exampleFormControlSelect1" name="status">
                    <option value="1">Active</option>
                    <option value="0">Deactive</option>
                   
                  </select>
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
 


     
<script type="text/javascript">
  function deletesubcategory(id) {
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


@endsection


