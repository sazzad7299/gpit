@extends('layouts.admin_layout')
{{-- 
@php

$categories=DB::table('categories')->select('name_bn');
@endphp --}}
@section('styles')
{{-- <link rel="stylesheet" href="{{url('')}}/asset/vendors/dataTable/dataTables.min.css" type="text/css"> --}}

<!-- Style  select2-->
{{-- <link rel="stylesheet" href="{{url('')}}/asset/vendors/select2/css/select2.min.css" type="text/css"> --}}
@endsection


@section('content')




<!--begin::Card-->
<div class="card card-custom gutter-b">
  <div class="card-header flex-wrap py-3">
    <div class="card-title">
      <h3 class="card-label">Add Category
    </div>
    <div class="card-toolbar">
         
      <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#category">
        Add Category
      </button>
    </div>
  </div>
  <div class="card-body">
  <table id="myTable" class="table table-striped table-bordered">
  <thead>
      @include('partial.msg')
    <tr>
      <th>Id</th>
      <th >Designation</th>
    
      <th >Writer Bangla Name</th>

      <th >Writer Address</th>
      <th>Email </th>
      
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach($users as $key=>$user)
    <tr>
    <td>{{ $key+1 }}</td>
    <td>{{ $user->designation }}</td>
    <td>{{ $user->bangla_name }}</td>
    <td>{{ $user->location }}</td>
    <td>{{ $user->email }}</td>
    

    <td>
        @if($user->status == 1) 
                                 
             <button type="submit" class="btn btn-sm btn-success" name="changeStatus" value="0">Active</button>
                                                
                         @else
                                                         
            <button type="submit" class="btn btn-sm btn-danger" name="changeStatus" value="1">Inactive</button>
                                                                              
                         @endif
    </td>
    
    <td class="text-center">
      <div class="btn-group" role="group" aria-label="Second group">
      
          <a href="{{ route('writer.edit', $user->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
      </div>
          <div class="btn-group" role="group" aria-label="Second group">
            <button class="btn btn-danger" type="button" onclick="deletewriter({{ $user->id }})">
              <i class="fa fa-trash"></i>
            </button>
            <form id="delete-form-{{ $user->id }}" action="{{ route('writer.destroy',$user->id) }}" method="POST" >
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
<div class="modal fade" id="category" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="categoryLabel">Add User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="ti-close"></i>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('writer.store') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="control-label" for="bangla_name">Writer Bangla Name <span class="m-l-5 text-danger"> *</span></label>
                    <input class="form-control" type="text" name="bangla_name" id="bangla_name" value="{{ old('bangla_name') }}"/>
                    
                </div>
            <div class="tile-body">

                <div class="form-group">
                    <label class="control-label" for="name">Email <span class="m-l-5 text-danger"> *</span></label>
                    <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}"/>
                   
                </div>

                <div class="form-group">
                    <label class="control-label" for="password">Password <span class="m-l-5 text-danger"> *</span></label>
                    <input class="form-control" type="password" name="password" id="password" value="{{ old('password') }}"/>
                   
                </div>
                @php
                      $designation=App\designation::where('status',1)->get();
                @endphp
              

                <div class="form-group">

                    <label class="control-label" for="name">designation<span class="m-l-5 text-danger"> *</span></label>
                    <select class="form-control" id="exampleFormControlSelect1" name="designation">
                      @foreach ($designation as $row)
                     
                      <option value="{{$row->id}}">{{$row->name_bn}}</option>
                      @endforeach
      
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
         <a href="{{route('author.post.index')}}" class="btn btn-secondary" data-dismiss="modal">Close
            </a>
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

<!-- Javascript select2-->
{{-- <script src="{{url('')}}/asset/vendors/select2/js/select2.min.js"></script> --}}


   <script>
   $(document).ready(function (){
    $('#myTable').DataTable({
        "scrollY": "400px",
        "scrollCollapse": true
    });
});

  </script>

  <script>

  $('.select2-example').select2({
    placeholder: 'Select'
});

</script>
 

<script type="text/javascript">
  function deletewriter(id) {
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

