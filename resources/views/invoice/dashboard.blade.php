@extends('layouts.admin_layout')
@section('css')

<link rel="stylesheet" href="./style.css">
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


h1 {
margin-top: 6rem;
margin-left: 80px;
text-align: center;
font-family: "Roboto";
font-weight: 40;
font-size: 4rem;
text-transform: uppercase;
color: rgb(32, 3, 163);
letter-spacing: 6px;
text-shadow: 10px 10px 10px rgba(0, 0, 0, 0.3);
}



.row{
margin-left: 70px;
}

.card-counter{
  box-shadow: 2px 2px 10px #DADADA;
  margin: 5px;
  padding: 40px 10px;
  background-color: #fff;
  width:170px;
  border-radius: 5px;
  float: left;
  transition: .3s linear all;
}

.card-counter:hover{
  box-shadow: 4px 4px 20px #DADADA;
  transition: .3s linear all;
}

.card-counter.primary{
  background-color: #007bff;
  color: #FFF;
}

.card-counter.danger{
  background-color: #ef5350;
  color: #FFF;
}  

.card-counter.success{
  background-color: #66bb6a;
  color: #FFF;
}  

.card-counter.info{
  background-color: #26c6da;
  color: #FFF;
}  

.card-counter i{
  font-size: 5em;
  opacity: 0.2;
}

.card-counter .count-numbers{
  position: absolute;
  margin-top: -86px;
 
  font-size: 32px;
  display: block;
}

.card-counter .count-name{
  position: absolute;
  
 
  font-style: italic;
  text-transform: capitalize;
  opacity: 0.7;
  display: block;
  font-size: 18px;
}

input[type="date"] {
  width: 35%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 4px;
}


input[type="submit"] {
  width: 20%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 4px;
}




</style>
@endsection
@section('content')
<div class="container">
      <div class="container">


        <div class="container">

            @php
           
            $invoice_income_total=App\Invoice::where('status',1)->sum('inputtotal');
            $invoice_expence_total=App\Invoice::where('status',2)->sum('inputtotal');
            $invoice_income_due=App\Invoice::where('status',1)->sum('due');
            $invoice_expence_due=App\Invoice::where('status',2)->sum('due');
        @endphp





            <div class="row">
            <div class="col-md-3">
              <div class="card-counter primary">
                <i class="fa fa-file-o"></i>
                <span class="count-numbers"> {{$invoice_income_total}}&#2547;</span>
                <span class="count-name">Total Income</span>
              </div>
            </div>
        
            <div class="col-md-3">
              <div class="card-counter danger">
                <i class="fa fa-ticket"></i>
                <span class="count-numbers">{{$invoice_expence_total}}&#2547;</span>
                <span class="count-name">Total Expence</span>
              </div>
            </div>
        
            <div class="col-md-3">
              <div class="card-counter success">
                <i class="fa fa-folder-o"></i>
                <span class="count-numbers">{{$invoice_income_due}}&#2547;</span>
                <span class="count-name">Total Income Due</span>
              </div>
            </div>
        
            <div class="col-md-3">
              <div class="card-counter info">
                <i class="fa fa-ticket"></i>
                <span class="count-numbers">{{$invoice_expence_due}}&#2547;</span>
                <span class="count-name">Total Expence Due</span>
              </div>
            </div>
           
    
          
          
            </div>


            <div>
                <h1>Report</h1>
                <form method="POST" action="{{ route('admin.report') }}">
                    @csrf
                <tr>
                    <td>
                        <input type="date" name="startdate" >
                    </td>
                    <td>
                        <input type="date" name="enddate" >
                    </td>
                    <td> 
                      <input type="submit"  value="Report Generate" formtarget="_blank"/>


                    </td>
                </tr>
                </form>
            </div>
    
  </div>


  
@endsection
@section('scripts')


  
@endsection