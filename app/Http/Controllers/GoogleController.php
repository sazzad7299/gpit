<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Google_adds;



class GoogleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $google_adds= Google_adds::get();
        return view('google_adds.index',compact('google_adds'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'ads_code' => 'required',
           
        ]);

        $google_adds= new Google_adds();
       
        $google_adds->ads_code= $request->ads_code;

        $google_adds->status= $request->status;
     

    // add other fields
        $google_adds->save();
    
    
    
            
        return redirect('/admin/google_add')->with('successMsg', 'google_adds saved!');
    }

    public function edit($id)
    { 
        $google_adds=Google_adds::findOrFail($id);
        return view('google_adds.edit',compact('google_adds'));
    }

    public function update(Request $request, $id)
    {
        $google_adds = Google_adds::find($id); 
        
        $google_adds->ads_code= $request->ads_code;

        $google_adds->status= $request->status;
     

    // add other fields
        $google_adds->update();
    
    
    
            
        return redirect('/admin/google_add')->with('successMsg', 'google_adds saved!');

    }

    public function destroy($id)
    {
        
        $google_adds=Google_adds::findOrFail($id);
        $google_adds->delete();
     
        return redirect()->route('google_add.index')->with('successMsg', 'google_adds delete!');
    }

    



    

}
