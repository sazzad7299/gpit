@extends('layouts.admin_layout')

@section('styles')
{{-- <link rel="stylesheet" href="{{url('')}}/asset/vendors/dataTable/dataTables.min.css" type="text/css"> --}}
@endsection


@section('content')




<!--begin::Card-->
<div class="card card-custom gutter-b">
  <div class="card-header flex-wrap py-3">
    <div class="card-title">
      <h3 class="card-label">Application
    </div>
    <div class="card-toolbar">


    </div>
  </div>
  @foreach($applications as $application)
  <div class="modal fade" id="exampleModal_{{$application->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message Sent: {{$application->a_name}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('sentsmsuser',$application->id) }}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="message-text" class="col-form-label">Message:</label>
              <textarea class="form-control" id="message-text" name="message_text"></textarea>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Send message</button>

        </div>
      </form>
      </div>
    </div>
  </div>
  @endforeach


  @foreach($applications as $application)
  <div class="modal fade" id="exampleModal_{{$application->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message Sent: {{$application->a_name}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('sentsmsuser',$application->id) }}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="message-text" class="col-form-label">Message:</label>
              <textarea class="form-control" id="message-text" name="message_text"></textarea>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Send message</button>

        </div>
      </form>
      </div>
    </div>
  </div>
  @endforeach
  <div class="card-body">
    <!--begin: Datatable-->
    <table class="table table-striped table-bordered" id="myTable">
      <thead>
        @include('partial.msg')
      <tr>
        <th>Id</th>
        <th>Date</th>
        <th>Name</th>
        <th>Email</th>
        <th>Company</th>
        <th>Number</th>
        <th>City</th>
        <th>Attendance</th>
        <th>Services Name</th>
        <th>Find By</th>
        <th>Status</th>
        <th>SMS</th>
      </tr>
    </thead>
    <tbody>

      @foreach($applications as $key=>$application)
      <tr>
        <td>{{$key+1}}</td>
        <td>{{ \Carbon\Carbon::parse($application->created_at)->format('d M, Y')}}</td>
        <td>{{$application->a_name }}</td>
        <td>{{$application->email }}</td>
        <td>{{$application->company }}</td>
        <td>{{ $application->a_number }}</td>
        <td>{{ $application->city }}</td>
        <td>{{ $application->attendance_type }}</td>
        <td>{{ $application->a_country }}</td>
        <td>{{ $application->find_throw }}</td>
        <td>
        <select name="find_throw" class="statusDropdown" data-application-id="{{ $application->id }}">
            <option value="1" @if($application->status == 1) selected @endif>Follow Up</option>
            <option value="2" @if($application->status == 2) selected @endif>Ongoing</option>
            <option value="3" @if($application->status == 3) selected @endif>Done</option>
        </select>
        </td>
        <td>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_{{$application->id}}" >Send Sms</button>
        </td>
      </tr>
      @endforeach
    </tbody>
    </table>
    <!--end: Datatable-->
  </div>
</div>
<!--end::Card-->



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
  function deleteCategory(id) {
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
  };



</script>

<script>

document.querySelectorAll('.statusDropdown').forEach(function(dropdown) {
    dropdown.addEventListener('change', function() {
        let status = this.value;
        let applicationId = this.getAttribute('data-application-id');

        fetch(`/update-status/${applicationId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ status: status })
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                alert('Status updated successfully');
            } else {
                alert('Failed to update status');
            }
        });
    });
});

</script>
@endsection


