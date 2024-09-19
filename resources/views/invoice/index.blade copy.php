<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
 <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

.nav__cont {
  position: fixed;
  width: 60px;
  top: 0;
  left: 0;
  height: 200vh;
  z-index: 100;
  background-color: #0010a5;
  overflow: hidden;
  transition: width 0.3s ease;
  cursor: pointer;
  box-shadow: 4px 7px 10px rgba(98, 3, 175, 0.4);
}
.nav__cont:hover {
  width: 200px;
}
@media screen and (min-width: 600px) {
  .nav__cont {
    width: 80px;
  }
}
table td{
  font-size: 18px;
}

.nav {
  list-style-type: none;
  color: white;
}
.nav:first-child {
  padding-top: 1.5rem;
}

.nav__items {
  padding-bottom: 2rem;
  font-family: "roboto";
}
.nav__items a {
  position: relative;
  display: block;
  top: -35px;
  padding-left: 25px;
  padding-right: 15px;
  transition: all 0.3s ease;
  margin-left: 25px;
  margin-right: 10px;
  text-decoration: none;
  color: white;
  font-family: "roboto";
  font-weight: 100;
  font-size: 1.35em;
}
.nav__items a:after {
  content: "";
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  border-radius: 2px;
  background: radial-gradient(circle at 94.02% 84.03%, #ac46ff, transparent 100%);
  opacity: 0;
  transition: all 0.5s ease;
  z-index: -10;
}
.nav__items:hover a:after {
  opacity: 1;
}
.nav__items i{
  width: 26px;
  height: 26px;
  position: relative;
  left: -25px;
  cursor: pointer;
}
@media screen and (min-width: 600px) {
  .nav__items i{
    width: 32px;
    height: 32px;
    left: -15px;
  }
}

body {
  height: 100vh;
  background: radial-gradient(circle at 94.02% 88.03%, #0176fc7a, transparent 60%), radial-gradient(circle at 25.99% 27.79%, #0320c28e, transparent 40%), radial-gradient(circle at 50% 50%, #0000004f, #00000046 60%);
}

h1 {
  margin-top: 6rem;
  margin-left: 80px;
  text-align: center;
  font-family: "Roboto";
  font-weight: 100;
  font-size: 4rem;
  text-transform: uppercase;
  color: white;
  letter-spacing: 6px;
  text-shadow: 10px 10px 10px rgba(0, 0, 0, 0.3);
}
        .wrapper2 {
            margin-left: 100px;
        }
       

        table {
            border-collapse: collapse;
        }
       
        a, u {
  text-decoration: none;
}
        .button {
    
    padding: 10px;
   padding-left: 30px;
   padding-right: 30px;
  text-align: center;
  color: #000;
  text-transform: uppercase;
  font-weight: 600;
  margin-left: 5px;
  margin-bottom: 5px;
  cursor: pointer;
  display: inline-block;
}


@keyframes pulse {
  0% {
    transform: scale(1);
  }
  70% {
    transform: scale(.9);
  }
    100% {
    transform: scale(1);
  }
}

.button-5 {
  
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
}

.button-5:hover {
  background-position: -100%;
  transition: background 100% ease-in-out;
}
.button-6 {
  width: 70px;
    color: white;
  border-radius: 5px;
  background-color: #ff0000;
  background-image: #ff0000;
  background-image: -moz-linear-gradient(top, rgb(5, 14, 153) 0%, #ff0000 100%); 
  background-image: -webkit-linear-gradient(top, rgb(5, 14, 153) 0%,#ff0000 100%); 
  background-image: linear-gradient(to bottom, rgb(5, 14, 153) 0%,#ff0000 100%); 
  background-size: 200px;
  background-repeat: no-repeat;
  background-position: 0%;
  -webkit-transition: background 300ms ease-in-out;
  transition: background 300ms ease-in-out;
}
.button-6:hover {
  background-position: -200%;
  transition: background 300ms ease-in-out;
}

.button-6 {
  width: 70px;
    color: white;
  border-radius: 5px;
  background-color: #ff0000;
  background-image: #ff0000;
  background-image: -moz-linear-gradient(top, rgba(5, 15, 153, 0.555) 0%, #ff0000 100%); 
  background-image: -webkit-linear-gradient(top, rgb(5, 15, 153, 0.555) 0%,#ff0000 100%); 
  background-image: linear-gradient(to bottom, rgb(5, 15, 153, 0.555) 0%,#ff0000 100%); 
  background-size: 200px;
  background-repeat: no-repeat;
  background-position: 0%;
  -webkit-transition: background 300ms ease-in-out;
  transition: background 300ms ease-in-out;
}
.button-6:hover {
  background-position: -200%;
  transition: background 300ms ease-in-out;
}

.button-7 {
  
    color: white;
  border-radius: 5px;
  background-color: #239400;
  background-image: #239400;
  background-image: -moz-linear-gradient(top, rgba(5, 15, 153, 0.438) 0%, #239400 100%); 
  background-image: -webkit-linear-gradient(top, rgb(5, 15, 153, 0.438) 0%,#239400 100%); 
  background-image: linear-gradient(to bottom, rgb(5, 15, 153, 0.438) 0%,#239400 100%); 
  background-size: 200px;
  background-repeat: no-repeat;
  background-position: 0%;
  -webkit-transition: background 300ms ease-in-out;
  transition: background 300ms ease-in-out;
}
.button-7:hover {
  background-position: -200%;
  transition: background 300ms ease-in-out;
}

 input[type=number]{
    
    border: hidden;
    padding: 3px 0px 3px 0px;
    width: 100%;
    float: right;
    border-radius: 10px;font-size: 24px;


}
input[readonly]
{
    background-color:#ccc;
    border: hidden;
    padding: 3px 0px 3px 0px;
    width: 100%;
    float: right;
    border-radius: 10px;font-size: 24px;
}
input[type=text]{
    
    border: hidden;
    padding: 3px 0px 3px 0px;
    width: 100%;
    float: right;
    border-radius: 10px;
    font-size: 24px;
}

textarea{
    
    width: 99%;
    border: hidden;
    padding-bottom: 3px;
    float: right;
    border-radius: 10px;font-size: 18px;



}
select{
    border: hidden;
    padding: 3px;
    border-radius: 10px;
    font-size: 24px;

    
}
input[type='date']{
  border: hidden;
    padding: 3px;
    border-radius: 10px;
    font-size: 24px;
}
input[type='checkbox'] {
    
    width:30px;
    height:30px;
    
    border-radius:10px;
    border:2px solid #555;
}
input:checked {
   width:30px;
    height:30px;
    
    border-radius:10px;
    border:2px solid #555;
}
label{
  
    float: left;
    padding: 3px 0px 3px 0px;
    font-size: 18px;
  
} 


form {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
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
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}
</style>

</head>
<body>



  @include('include.newsidebar')


    <div class="wrapper">
        <main>

            <div class="wrapper2">


        <form method="POST" action="{{ route('admin.invoices.store') }}">
          @csrf
          <label>Customer Name:</label>
          <input type="text" name="customer_name">
          <br>
          <label>Invoice Number:</label>
          <input type="text" name="invoice_number">
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
      <td>                   <button type="button" id="add-item">Add Item</button>
      </td>
              </tr>
            </tfoot>
          
        </table>

      

        <div>Total : <span id="total"></span></div>
        <label for="discount">discount:</label>
        <input type="text" name="discount" id="discount">

        
          <label for="payments">Payments:</label>
        <input type="text" name="payments" id="payments">

      
        <label for="due">Due:</label>
        <span id="due"></span>
          
          <br>
          <button type="submit">Save</button>
        </form>

      </div>
    </div>
  
    <!-- /#page-content-wrapper -->




    </main>

  



 <script>

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
        total -= payments;
    }

    if(!isNaN(discount)) {
    total -= discount;
    }
    $("#total").text(total);
    $("#due").text(total);
});

  

 </script>
</body>
</html>