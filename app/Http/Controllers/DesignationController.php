<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\designation;

class DesignationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $designations=designation::all();
        
        return view('designations.index',compact('designations'));
        
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name_bn' => 'required|unique:designations',
           
        ]);

        $designations= new designation();
        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }
        
        $slug = make_slug($request->name_bn);
       
       
        $designations->name_bn= $request->name_bn;
       
        
        $designations->slug_bn= $slug;
       
        
        

        $designations->status= $request->status;

        //$designations->time= $request->created_at->diffForHumans();


    // add other fields
        $designations->save();
    
    
    
            
        return redirect('/admin/designation')->with('successMsg', 'designation saved!');
    }


    public function edit($id)
    { 
        $designations=designation::findOrFail($id);
        return view('designations.edit',compact('designations'));
    }


    public function update(Request $request, $id)
    {
        $designations = designation::find($id);
         
        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }
        
        $slug = make_slug($request->name_bn);
       
       
        $designations->name_bn= $request->name_bn;
       
        
        $designations->slug_bn= $slug;
        
        
        

        $designations->status= $request->status;

    // add other fields
    $designations->update();

            
    return redirect('/admin/designation')->with('successMsg', 'designation Update!');

    }




    public function destroy($id)
    {
        
        $user=designation::findOrFail($id);
        $user->delete();
     
        return redirect()->route('designation.index')->with('successMsg', 'designation delete!');
    }

}
