@extends('layouts.admin_layout')
@section('styles')

@endsection


@section('content')


<!--begin::Card-->
<div class="card card-custom gutter-b">
  <div class="card-header flex-wrap py-3">
    <div class="card-title">
      <h3 class="card-label">All row
    </div>
    <div class="card-toolbar">
         
      <a href="{{ route('website.create') }}" class="btn btn-primary pull-right">Add row</a>
    </div>
  </div>
  <div class="card-body">

    <table id="myTable" class="table table-striped table-bordered" >
  <thead>
      @include('partial.msg')
    <tr>
      <th>Id</th>
      <th>Name</th>


      <th>Page</th>
     
     
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach($rows as $key=>$row)
    <tr>
    <td>{{ $key+1}}</td>
    
    <td> <a href="{{url('/rowdetails/'.$row->id."/".$row->name)}}">{{ $row->name }}</a>
    </td>  
    
    
     @if ($row->pages==null)
          
      @else
      <td>{{ $row->pages->p_name }}</td> 
      @endif
    
  
   

    
    
    
    <td class="text-center">
      
       
      

        <div class="dropdown ml-auto">
          <button href="#" data-toggle="dropdown"  class="btn btm-sm btn-success">
              <i class="fa fa-ellipsis-v"> </i>
            
          </button>
          <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="{{ route('website.edit', $row->id) }}" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a>
              <a  class="dropdown-item" href="{{ route('website.show', $row->id) }}" class="btn btn-success"><i class="fa fa-eye-slash"></i>Show</a>

              <form action="{{ route('website.destroy',$row->id) }}" method="Post">
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
   $(document).ready(function (){
    $('#myTable').DataTable({
        "scrollY": "400px",
        "scrollCollapse": true
    });
});

  </script>
 
@endsection
