<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use PDF;

Use App\Invoice;
Use App\InvoiceItem;
Use App\Customer;
Use App\User;
Use App\SiteSetting;
Use DB;
use Auth;
class InvoiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function dashboard()
    {
     
        return view('invoice.dashboard');
    }


    
    function report(Request $request)
    {

       

        $startDate = $request->startdate;
        $endDate = $request->enddate;

        $incomerows = Invoice::whereBetween('created_at', [$startDate, $endDate])->where('status',1)->get();
       

        $expencerows = Invoice::whereBetween('created_at', [$startDate, $endDate])->where('status',2)->get();




        $incometotal = Invoice::whereBetween('created_at', [$startDate, $endDate])->where('status',1)->sum('payments');


        $expencetotal = Invoice::whereBetween('created_at', [$startDate, $endDate])->where('status',2)->sum('payments');




        $incomedue = Invoice::whereBetween('created_at', [$startDate, $endDate])->where('status',1)->sum('due');


        $expencedue = Invoice::whereBetween('created_at', [$startDate, $endDate])->where('status',2)->sum('due');




        

    

        $invoice = PDF::loadView('invoice.report',compact('incomerows','expencerows','incometotal','expencetotal','incomedue','expencedue'));
            $invoice->SetProtection(['copy', 'print'], '', 'pass');
            return $invoice->stream("report".".pdf");
    
    }


    public function index()
    {

        $rows=Invoice::all();
       

        return view('invoice.index',compact('rows'));
    }


    
    public function create()
    {
        $customers=Customer::all();
       
        return view('invoice.create',compact('customers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            
        ]);


       

        $invoice = new Invoice;


        $lastInvoiceId = DB::table('invoices')->latest('id')->first();
        if ($lastInvoiceId) {
          $invoice_number = $lastInvoiceId->invoice_number + 1;
        } else {
          $invoice_number = 100000;
        }



        $invoice->invoice_number = $invoice_number;

        $invoice->date = date('Y-m-d H:i:s');


        $invoice->inputtotal = $request->inputtotal;

        $invoice->discount = $request->discount;

        $invoice->payments = $request->payments;

        $invoice->due = $request->due;

        $invoice->note = $request->note;

        $invoice->status = $request->status;

        $customar = Customer::where('mobile',$request->mobile)->first();

       
        
       

       

      
        if ($customar!=null) {
           
            $invoice->mobile = $customar->mobile;

            $invoice->address = $customar->address;

            $invoice->customer_name = $customar->customer_name;


            $invoice->save();
       
        }


        elseif($customar==null) {
            $customaradd = new Customer;
            $customaradd->mobile = $request->mobile;

            $customaradd->address = $request->address;

            $customaradd->customer_name = $request->customer_name;
            $customaradd->save();

            $invoice->mobile = $request->mobile;

            $invoice->address = $request->address;

            $invoice->customer_name = $request->customer_name;

          

            $invoice->save();

           
       
        }
    
      

        // Create and attach the invoice items
        if ($request->items!=null) {
            foreach ($request->items as $item) {
                $invoiceItem = new InvoiceItem;
                $invoiceItem->name = $item['name'];
                $invoiceItem->quantity = $item['quantity'];
                $invoiceItem->price = $item['price'];
    
                $invoiceItem->subtotal = $item['price']*$item['quantity'];
                $invoice->items()->save($invoiceItem);
            }
        }
        
        return redirect()->route('admin.invoices.edit', $invoice->id);
    }




    public function edit($id)
    {
        $data = Invoice::find($id);

        $rows = InvoiceItem::where('invoice_id',$id)->get();
        
        return view('invoice.edit', compact('data','rows'));
    }

    public function update(Request $request, $id)
    {
        

        
        $data = Invoice::findOrFail($id);

        $data->mobile = $request->mobile;

        $data->address = $request->address;

        $data->note = $request->note;

        $data->customer_name = $request->customer_name;


      


        $data->inputtotal = $request->inputtotal;

        $data->discount = $request->discount;

        $data->payments = $request->payments;

        $data->due = $request->due;
       
        $data->status = $request->status;
       
        $rows = $request->input('row');
       
      
        if ($rows!=null) {
            foreach ($rows as $row) {
               
                $invoicerow = InvoiceItem::find($row['row_id']);
                
                $invoicerow->name = $row['name'];
                $invoicerow->quantity = $row['quantity'];
                $invoicerow->price = $row['price'];
    
                $invoicerow->subtotal = $row['price']*$row['quantity'];
                $invoicerow->update();
            }
     
        }

       

        if ($request->items!=null) {
        foreach ($request->items as $item) {
            $invoiceItem = new InvoiceItem;
            $invoiceItem->name = $item['name'];
            $invoiceItem->quantity = $item['quantity'];
            $invoiceItem->price = $item['price'];

            $invoiceItem->subtotal = $item['price']*$item['quantity'];
            $data->items()->save($invoiceItem);
        }
    }

    $data->update();

    if ( $data->update()) {
        if ($request->delete_id!=null) {
           
            $delete = InvoiceItem::find($request->delete_id);
        
            $delete->delete();
       
    
      }
    }

    if ( $data->update()) {
        if ($request->print==1) {
           
            $invoice = Invoice::find($id);

            $user = Auth::user();
    
           
            $rows = InvoiceItem::where('invoice_id',$id)->get();
            
          
    
            $invoice = PDF::loadView('invoice.print',compact('invoice','rows','user'));
            $invoice->SetProtection(['copy', 'print'], '', 'pass');
            return $invoice->stream("invoice".".pdf");
       
    
      }
    }
   
        return redirect()->back();
    }

    public function print($id)
    {
        $invoice = Invoice::find($id);

                $SiteSetting=SiteSetting::first();


       
        $rows = InvoiceItem::where('invoice_id',$id)->get();
        
      

        $invoice = PDF::loadView('invoice.print',compact('invoice','rows','SiteSetting'));
        $invoice->SetProtection(['copy', 'print'], '', 'pass');
        return $invoice->stream("invoice".".pdf");
    }

    public function destroy($id)
        {
        $item = Invoice::findOrFail($id);
        $rows = InvoiceItem::where('invoice_id',$id)->get();
        $item->delete();
        foreach($rows as $row){
            $row->delete();
        }
        
        return redirect()->back();
        }
   
   


}
