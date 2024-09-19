@extends('layouts.admin_layout')
@section('css')
<style>
  form {
  max-width: 100%;
  margin: 0 auto;
  padding: 20px;
 
}

label {
  display: block;
  margin-bottom: 10px;
}

input[type="text"] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 4px;
}

table {
  width: 100%;
  border-collapse: collapse;
}

table th,
table td {
  border: 1px solid #ccc;
  padding: 8px;
}

table th {
  background-color: #f2f2f2;
}

table .subtotal {
  text-align: right;
}

#total {
  font-weight: bold;
}

#due {
  font-weight: bold;
}

button {
  color: white;
  border-radius: 5px;
  background-color: #022e8f;
  background-image: #023dbd;
  background-image: -moz-linear-gradient(top, rgb(153, 5, 146) 0%, #023dbd 100%); 
  background-image: -webkit-linear-gradient(top, rgb(153, 5, 146) 0%,#023dbd 100%); 
  background-image: linear-gradient(to bottom, rgb(153, 5, 146) 0%,#023dbd 100%); 
  background-size: 100%;
  background-repeat: no-repeat;
  background-position: 0%;
  -webkit-transition: background 100% ease-in-out;
  transition: background 100% ease-in-out;
  padding: 10px;
}

button:hover {
  opacity: 0.8;
}

.right-sight{
  width: 30%;
  float: right;
}
select {
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
  background-color: white;
}
.divcustomer{
  float: left;
  width: 30%;
  padding: 10px
}
.divcustomerright{
  float: right;
  width: 48%;
  padding: 10px
}
</style>

@endsection
@section('content')
<div class="container">
      <div class="container">
            <h1>Invoice Create</h1>
            <form method="POST" action="{{ route('admin.invoices.store') }}">
              @csrf

             
             


               
                
             

            <div>
              <div class="divcustomer">
                <label>Customer Name:</label>

              
              <input type="text" id="carInput"  name="mobile" list="cars" />
              <datalist id="cars" > 
               
                @foreach ($customers as $customer)

                <option value="{{$customer->mobile}}">{{$customer->mobile}}</option>

                @endforeach
              
               
              </datalist>

              </div>
             
              
              <div id="newDiv" class="divcustomerright"  style="display: none;">

                <label>Name:</label>
                <input type="text" name="customer_name" >

                <label>Address:</label>
                <input type="text" name="address"  >

                  
              </div>

            </div>
           


              <br>
              <table id="invoice-items">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="items[0][name]"></td>
                        <td><input type="text" class="quantity" name="items[0][quantity]"></td>
                        <td><input type="text" class="price" name="items[0][price]"></td>
                        <td class="subtotal"></td>
                        <td><button type="button" class="remove-item">Remove</button></td>
                    </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td>                   
                      <button type="button" id="add-item">Add Item</button>
                    </td>
                  </tr>
                </tfoot>
              
               </table>
    
          
            <div class="right-sight">
              <div>Total : <span id="total"></span></div>
              <input type="hidden" name="inputtotal" id="inputtotal">
              <label for="discount">discount:</label>
              <input type="number" name="discount" id="discount">
      
              
                <label for="payments">Payments:</label>
              <input type="number" name="payments" id="payments">
      
            
              <label for="due">Due:</label>
              <input type="hidden" name="due" id="due">
              <span id="duetext"></span>
                
                <br>
                <button style="float: right" type="submit">Save</button>
            </div>


            <div>

              <label for="status">Choose Status:</label>

                <select name="status" id="status">
                  <option value="1">Income</option>
                  <option value="2">Expence</option>
                 
                </select>

              <label for="note">Note:</label>
              <textarea name="note" id="" cols="30" rows="5"></textarea>
            
              
            
            </div>
           
            </form>
    </div>
    
  </div>


  
@endsection
@section('scripts')
<script>


  $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });
  
  
      // Add item button click event
      $("#add-item").click(function(){
          var numItems = $("#invoice-items tr").length - 1;
          var newRow = '<tr><td><input type="text" name="items[' + numItems + '][name]"></td><td><input type="text" name="items[' + numItems + '][quantity]"></td><td><input type="text" name="items[' + numItems + '][price]"></td><td class="subtotal"></td><td><button type="button" class="remove-item">Remove</button></td></tr>';
          $("#invoice-items").append(newRow);
      });
  
      // Remove item button click event
      $(document).on('click', '.remove-item', function(){
          $(this).closest('tr').remove();
      });
  
      // Calculate subtotal and total on keyup event
      
  
  
      $(document).on('keyup', 'input[name^="items"], #payments,#discount', function(){
      var total = 0;
      
      $("#invoice-items tr").each(function(){
          var row = $(this);
          var quantity = row.find('input[name$="[quantity]"]').val();
          var price = row.find('input[name$="[price]"]').val();
          if(!isNaN(quantity) && !isNaN(price)) {
              var subtotal = (quantity*price);
              row.find('.subtotal').text(subtotal);
              total += subtotal;
          }
      });
      var payments = $("#payments").val();
      var discount = $("#discount").val();
      if(!isNaN(payments)) {
          var due = total-payments;
      }
  
      if(!isNaN(discount)) {
      var due = total-payments-discount;
      }
      var inputtotal= total;
      $("#inputtotal").val(inputtotal);
      $("#total").text(total);
      $("#due").val(due);
      $("#duetext").text(due);
  });
  
  $(document).ready(function(){
    $("#carInput").change(function() {
      var inputValue = $("#carInput").val();
      var options = $("#cars option").map(function() {
        return $(this).val();
      }).get();
  
      if (!options.includes(inputValue)) {
        $("#newDiv").show();
      } else {
        $("#newDiv").hide();
      }
    });
  });
</script>   
@endsection