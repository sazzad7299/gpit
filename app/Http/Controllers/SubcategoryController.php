<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use App\Category;

use Illuminate\Support\Str;



class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $subcategories=Subcategory::all();
        $categories=Category::all();
        return view('subcategories.index',compact('subcategories','categories'));
    }


    public function edit($id)
    {
        $subcategories=Subcategory::findOrfail($id);
     
        $categories= Category::all();
        return view('subcategories.edit',compact('subcategories','categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name_bn' => 'required|unique:subcategories',
           
        ]);

        $subcategories= new Subcategory();
        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }
        
        $slug = make_slug($request->name_bn);
        
        // $subcategories->category_id= $request->category_id;
       
        $subcategories->name_bn= $request->name_bn;
      
        
        $subcategories->slug_bn= $slug;
       
        
        $subcategories->show_on_header= $request->show_on_header;

        $subcategories->status= $request->status;



        $subcategories->save();
    
    
    
            
        return redirect('/admin/subcategory')->with('successMsg', 'VisaCategory saved!');
    }


    public function update(Request $request, $id)
    {

        $subcategories = Subcategory::find($id); 
        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }
        
        $slug = make_slug($request->name_bn);
       

        
        // $subcategories->category_id= $request->category_id;
       
        $subcategories->name_bn= $request->name_bn;
        
        
        $subcategories->slug_bn= $slug;
        
        
        $subcategories->show_on_header= $request->show_on_header;

        $subcategories->status= $request->status;

    // add other fields
        $subcategories->update();

            
    return redirect('/admin/subcategory')->with('successMsg', 'VisaCategory Update!');

    }







    public function destroy($id)
    {
        $user=Subcategory::findOrFail($id);
        $user->posts()->delete();
        $user->delete();
     
        return redirect()->route('subcategory.index')->with('successMsg', 'VisaCategory Delete!');
    
    }




}
