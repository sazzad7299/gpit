@extends('layouts.admin_layout')

@section('content')
<div class="container">

                    <a type="button" href="{{ route('admin.invoices.create') }}" class="button button-5"  style="margin: 10px;float:right;">
                      Create invoices
                    </a>


                        <table id="example" class="display nowrap" style="width:100%">
                            <thead>
                                <tr> 
                                    <th>SI</th>
                                    <th>In Id</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                   
                                    <th>Date</th>
                                    <th>Payment</th>
                                    <th>Due</th>
                                    <th>Action</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rows as $key=>$row)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ date('Y') }}{{$row->invoice_number}}</td>
                                    <td>{{$row->customer_name}}</td>
                                    
                                    <td>{{$row->mobile}}</td>
                                    <td>{{$row->date}}</td>
                                    <td>{{$row->payments}}</td>
                                    <td>{{$row->due}}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a style="width: 20px" target="_blank" href="{{ route('admin.invoices.print',$row->id) }}" class="button button-7"><i class="fa fa-print" aria-hidden="true"></i></i></a>
                                            &nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;
                                            
                                            <a href="{{ route('admin.invoices.edit', $row->id) }}" class="button button-5" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i></a>
                                          
                                            &nbsp;&nbsp;&nbsp;
                                           
                                            <form id="delete-form-{{ $row->id }}" action="{{ route('admin.invoices.destroy',$row->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="button button-6" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $row->id }}').submit();
                                            }else {
                                                event.preventDefault();
                                                    }"><i class="fa fa-trash"></i></button> 
                                                
                                        </div>
                                    </td>
                                   
                                </tr>
                                @endforeach
                              
                               
                            </tbody>
                            <tfoot>
                                <tr>
                                  <th>SI</th>
                                  <th>In Id</th>
                                  <th>Name</th>
                                  <th>Phone</th>
                                 
                                  <th>Date</th>
                                  <th>Payment</th>
                                  <th>Due</th>
                                  <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    
                    </div>
                </div>
        </div>
            <!-- /#page-content-wrapper -->

            <!-- Modal -->
                {{-- <form action="{{ route('admin.tax.store') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div id="myModal" class="modal">

                 
                    <div class="modal-content">
                      <span class="close">&times;</span>
                                
                             
                                
                                
                                        <label for="userid">Tax Id</label><br>
                                        <input type="number" name="tax_id" id="" required><br>
                                
                                        
                                        
                                        <label for="">Name of the Assessee</label>
                                        <br>
                                        <input type="text" name="p1_03_assessee_name" id="" required><br>
                                    

                                    
                                        
                                        <label for="">Assessee Number</label><br>
                                        <input type="text" name="p1_20_contact_telephone" id="" required><br>
                                        <input type="hidden" name="status" value="1">
                                        

                                        
                             

                                      <button type="submit" class="button button-5" style="margin-top:20px">Create New</button>


                                    

                                
                                
                                    </div>

                                </div>
                </form> --}}

            <!-- End Model -->



</div>

@endsection




