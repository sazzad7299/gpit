<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>report</title>
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
      
           <h1>Income</h1>
           
        <table>
            <thead>
                <tr> 
                    <th>SI</th>
                    <th>In Id</th>
                    <th>Name</th>
                    <th>Phone</th>
                   
                    <th>Date</th>
                    <th>Payment</th>
                    <th>Due</th>
                    
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($incomerows as $key=>$incomerow)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{ date('Y') }}{{$incomerow->invoice_number}}</td>
                    <td>{{$incomerow->customer_name}}</td>
                    
                    <td>{{$incomerow->mobile}}</td>
                    <td>{{$incomerow->date}}</td>
                    <td>{{$incomerow->payments}}</td>
                    <td>{{$incomerow->due}}</td>
                   
                   
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
                  <th>{{$incometotal}}</th>
                  <th>{{$incomedue}}</th>
                 
                </tr>
            </tfoot>
        </table>


        <br>

        <h1>Expence</h1>

        <table>
            <thead>
                <tr> 
                    <th>SI</th>
                    <th>In Id</th>
                    <th>Name</th>
                    <th>Phone</th>
                   
                    <th>Date</th>
                    <th>Payment</th>
                    <th>Due</th>
                    
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($expencerows as $key=>$expencerow)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{ date('Y') }}{{$expencerow->invoice_number}}</td>
                    <td>{{$expencerow->customer_name}}</td>
                    
                    <td>{{$expencerow->mobile}}</td>
                    <td>{{$expencerow->date}}</td>
                    <td>{{$expencerow->payments}}</td>
                    <td>{{$expencerow->due}}</td>
                   
                   
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
                  <th>{{$expencetotal}}</th>
                  <th>{{$expencedue}}</th>
                 
                </tr>
            </tfoot>
        </table>
              
       
        <div class="footer"><br> ______________<br>Signature</div>
       
    </body>