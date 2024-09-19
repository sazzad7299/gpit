<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{$invoice->customer_name}}</title>
        <style>
            * {
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }
            h1,h2,h3,h4,h5,h6,p,span,div { 
                font-family: DejaVu Sans; 
                font-size:15px;
                font-weight: normal;
            }
            th,td { 
                font-family: DejaVu Sans; 
                font-size:15px;
            }
            .panel {
                margin-bottom: 20px;
                background-color: #fff;
               
                border-radius: 4px;
               
            }
            .panel-default {
                border-color: #ddd;
            }
            .panel-body {
                padding: 15px;
            }
            table {
                width: 100%;
                max-width: 100%;
                margin-bottom: 0px;
                border-spacing: 0;
                border-collapse: collapse;
                background-color: transparent;
            }
            thead  {
                text-align: left;
                display: table-header-group;
                vertical-align: middle;
            }
            th, td  {
                border: 1px solid #ddd;
                padding: 6px;
            }
            .well {
                width: 150px;
                position: fixed;
                bottom: 0;
                float: right;
                min-height: 50px;
                padding: 10px;
               bottom: -1px;
                background-color: #f5f5f5;
                border: 1px solid #e3e3e3;
                border-radius: 4px;
                /* -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
                box-shadow: inset 0 1px 1px rgba(0,0,0,.05); */
            }
            .footer{ 
                position: fixed;     
                text-align: right;    
                bottom: 0px; 
                width: 100%;
            } 
        </style>
        
    </head>
    <body>
      
           
           
               
             
              
                  <div style="float: right">
                Invoice :#{{ date('Y') }}{{$invoice->invoice_number}}
                <br>
               Date :  {{ $invoice->date }}
             </div>
              
              
               
           
          
           
      
        <main>
            <div>
                <div style="left:0pt; width:250pt; float: left;">
                   
                    <div class="panel panel-default">
                        <div class="panel-body">
                                     <img src="https://gpit.com.bd/uploads/about/gpit-2022-03-15-622ff50e2ee2b.png"  style="width:100px;hight:70px;"> 
                                     <br>

                            {{ $SiteSetting->title }}<br>
                            {{ $SiteSetting->email }}<br>
                            {{ $SiteSetting->phone }}<br>
                            {{ $SiteSetting->location }}<br>
                         
                           
                        </div>
                    </div>
                </div>
                <div style="float: right;margin:5px;">
                    <h4>Customer Details:</h4>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            {{ $invoice->customer_name }}<br>
                            {{ $invoice->mobile }}<br>
                            {{ $invoice->address }}<br>
                            
                         
                        </div>
                    </div>
                </div>
            </div>
            <h4>Items:</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                       
                        
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rows as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                          
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->subtotal }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="clear:both; position:relative;">
               
                    <div style="position:absolute; left:0pt; width:250pt;">
                     
                     
                        <h4>Notes:</h4>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                {{ $invoice->note }}
                            </div>
                        </div>
                    </div>
                  
                <div style="margin-left: 300pt;">
                    <h4>Total:{{ $invoice->inputtotal }}</h4>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><b>Discount</b></td>
                                <td>{{ $invoice->discount }}</td>
                            </tr>
                           
                            <tr>
                                <td><b>Payments</b></td>
                                <td><b>{{ $invoice->payments}} </b></td>
                            </tr>

                            <tr>
                                <td><b>Due</b></td>
                                <td><b>{{ $invoice->due}} </b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
          
            <br>
            <br>
               
                
        </main>

        <div class="footer"><br> ______________<br>Signature</div>
        <!-- Page count -->
       
    </body>