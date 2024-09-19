<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $rows=Page::all();
        
        return view('page.index',compact('rows'));
        
    }

    public function store(Request $request)
    {

        
        $this->validate($request,[
            'p_name' => 'required|unique:pages',    
        ]);

        $rows= new Page();
        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }
        
        $slug = make_slug($request->p_name);
       
       
        $rows->p_name= $request->p_name;
        $rows->page_description= $request->page_description;
        $rows->page_number= $request->page_number;
        $rows->header_show= $request->header_show;

        $rows->page_type= $request->page_type;
        $rows->slug= $slug;
       
       

        //$rows->time= $request->created_at->diffForHumans();


    // add other fields
        $rows->save();
    
    
    
            
        return redirect()->route('page.index')->with('successMsg', 'Page saved!');
    }


    public function edit($id)
    { 
        $rows=Page::findOrFail($id);
        return view('page.edit',compact('rows'));
    }


    public function update(Request $request, $id)
    {
        $rows = Page::find($id);
         
        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }
        
        $slug = make_slug($request->p_name);
        $rows->page_number= $request->page_number;
        $rows->header_show= $request->header_show;
       
        $rows->p_name= $request->p_name;
        $rows->page_description= $request->page_description;

        $rows->page_type= $request->page_type;
        $rows->slug= $slug;
    $rows->update();

            
    return redirect()->route('page.index')->with('successMsg', 'Page Update!');

    }




    public function destroy($id)
    {
        
        $rows=Page::findOrFail($id);
        $rows->delete();
     
        return redirect()->route('page.index')->with('successMsg', 'Page delete!');
    }

}
