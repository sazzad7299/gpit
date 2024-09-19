<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $categories=Category::all();
        
        return view('categories.index',compact('categories'));
        
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name_bn' => 'required|unique:categories',
           
        ]);

        $categories= new Category();
        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }
        
        $slug = make_slug($request->name_bn);
       
       
        $categories->name_bn= $request->name_bn;
       
        
        $categories->slug_bn= $slug;
       
        
        $categories->show_on_header= $request->show_on_header;

        $categories->status= $request->status;

        //$categories->time= $request->created_at->diffForHumans();


    // add other fields
        $categories->save();
    
    
    
            
        return redirect('/admin/category')->with('successMsg', 'Country saved!');
    }


    public function edit($id)
    { 
        $categories=Category::findOrFail($id);
        return view('categories.edit',compact('categories'));
    }


    public function update(Request $request, $id)
    {
        $categories = Category::find($id);
         
        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }
        
        $slug = make_slug($request->name_bn);
       
       
        $categories->name_bn= $request->name_bn;
       
        
        $categories->slug_bn= $slug;
        
        
        $categories->show_on_header= $request->show_on_header;

        $categories->status= $request->status;

    // add other fields
    $categories->update();

            
    return redirect('/admin/category')->with('successMsg', 'Country Update!');

    }




    public function destroy($id)
    {
        
        $user=Category::findOrFail($id);
        
        
       

        $user->posts()->delete();

        $user->subcategories()->delete();

        $user->delete();
     
        return redirect()->route('category.index')->with('successMsg', 'Country delete!');
    }

    

}
