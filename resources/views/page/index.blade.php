@extends('layouts.admin_layout')

@section('styles')
{{-- <link rel="stylesheet" href="{{url('')}}/asset/vendors/dataTable/dataTables.min.css" type="text/css"> --}}
@endsection


@section('content')


<!--begin::Card-->
<div class="card card-custom gutter-b">
  <div class="card-header flex-wrap py-3">
    <div class="card-title">
      <h3 class="card-label">Add Page
    </div>
    <div class="card-toolbar">
         
      <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#page">
        Add Page
      </button>
    </div>
  </div>
  <div class="card-body">
    <!--begin: Datatable-->
    <table class="table table-striped table-bordered" id="myTable">
      <thead>
        @include('partial.msg')
      <tr>
        <th>Id</th>
        <th> Name</th>
        
        <th> Slug</th>
      
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    
      @foreach($rows as $key=>$row)
      <tr>
      <td>{{ $key+1}}</td>
      <td>{{ $row->p_name }}</td>
      
      <td>{{ $row->slug}}</td>
     
     

      
      
      <td class="text-center">
              <div class="btn-group" role="group" aria-label="Second group">
              
                  <a href="{{ route('page.edit', $row->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
              </div>
                  <div class="btn-group" role="group" aria-label="Second group">
                    <button class="btn btn-danger" type="button" onclick="deletePage({{ $row->id }})">
                      <i class="fa fa-trash"></i>
                    </button>
                    <form id="delete-form-{{ $row->id }}" action="{{ route('page.destroy',$row->id) }}" method="POST" >
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
 
<!-- modal -->
<div class="modal fade" id="page" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="pageLabel">Add Page</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="ti-close"></i>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('page.store') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                <label class="control-label" for="name">Name <span class="m-l-5 text-danger"> *</span></label>
                <input class="form-control " type="text" name="p_name" id="name" value="{{old('name_bn')}}"/>
                
            </div>

            <div class="form-group">
              <label class="control-label" for="name">Page Description <span class="m-l-5 text-danger"> *</span></label>
              <input class="form-control " type="text" name="page_description" id="name" value="{{old('name_bn')}}"/>
              
          </div>


            <div class="form-group">
              <label class="control-label" for="name">Header Show <span class="m-l-5 text-danger"> *</span></label>
            
              
            <select class="form-control" id="exampleFormControlSelect1" name="header_show">
              <option value="1">Show</option>
              <option value="0">Hide</option>
             
            </select>
            </div>


            <div class="form-group">
              <label class="control-label" for="name">Page Type <span class="m-l-5 text-danger"> *</span></label>
            
              
            <select class="form-control" id="exampleFormControlSelect1" name="page_type">
              <option value="1">Group</option>
              <option value="0">Single</option>
              <option value="2">location</option>
             
            </select>
            </div>



            <div class="form-group">
              <label class="control-label" for="name">Menu Show List <span class="m-l-5 text-danger"> *</span></label>
            
              
            <select class="form-control" id="exampleFormControlSelect1" name="page_number">
              <option value="1">First</option>
              <option value="2">Second</option>
              <option value="3">Third</option>
              <option value="4">four</option>
              <option value="5">five</option>
              <option value="6">six</option>
              <option value="7">seven</option>
              <option value="10">None</option>
             
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


   <script>
   $(document).ready(function (){
    $('#myTable').DataTable({
        "scrollY": "400px",
        "scrollCollapse": true
    });
});

  </script>
    
<script type="text/javascript">
  function deletePage(id) {
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


