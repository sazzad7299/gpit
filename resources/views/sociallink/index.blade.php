@extends('layouts.admin_layout')
@push('styles')

<link rel="stylesheet" href="vendors/dataTable/dataTables.min.css" type="text/css">
@endpush

@section('page_header')
  <h4>sociallink Page</h4>  
@endsection

@section('content')

<div class="app-title">
       
       
     
    </div>
    

    <table id="myTable" class="table table-striped table-bordered" >
  <thead>
      @include('partial.msg')
    <tr>
      <th>Id</th>
      <th>Facebook</th>
      <th>Twitter</th>
      <th>Instagram</th>
      <th>Youtube</th>
      <th>Videmo</th>
      <th>Fliever</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach($sociallinks as $key=>$sociallink)
    <tr>
    <td>{{ $key+1}}</td>
    <td>{{ $sociallink->fb }}</td>
    <td>{{ $sociallink->twi }}</td>
    <td>{{ $sociallink->insta }}</td>
    <td>{{ $sociallink->yout }}</td>
    <td>{{ $sociallink->vid }}</td>
    <td>{{ $sociallink->fli }}</td>
   
   
    <td class="text-center">
            <div class="btn-group" role="group" aria-label="Second group">
            
                <a href="{{ route('sociallink.edit', $sociallink->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
            </div>

          
        </td>


        
    </tr> 
    
     
     
    
    
    
   
    @endforeach
    ...
  </tbody>
</table>
 


@endsection

@push('scripts')



<script src="vendors/dataTable/jquery.dataTables.min.js"></script>

<!-- Bootstrap 4 and responsive compatibility -->
<script src="vendors/dataTable/dataTables.bootstrap4.min.js"></script>
<script src="vendors/dataTable/dataTables.responsive.min.js"></script>
<script src="assets/js/examples/datatable.js"></script>
   <script>
   $(document).ready(function (){
    $('#myTable').DataTable({
        "scrollY": "400px",
        "scrollCollapse": true
    });
});

  </script>


@endpush

@section('scripts')
    
<script type="text/javascript">
  function deletesociallink(id) {
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


