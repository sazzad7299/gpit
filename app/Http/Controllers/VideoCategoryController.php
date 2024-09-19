<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Str;

use App\VideoCategory;

class VideoCategoryController extends Controller
{
    public function index()
    {
        $videocategory=VideoCategory::all();
        
        return view('videocategory.index',compact('videocategory'));
        
    }

    public function store(Request $request)
    {
        
        $this->validate($request,[
            'name_bn' => 'required',
           
        ]);
        

        $videocategory= new VideoCategory();
        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }
        
        $slug = make_slug($request->name_bn);
       
       
        $videocategory->name_bn= $request->name_bn;
       
        
        $videocategory->slug_bn= $slug;
       
        
        $videocategory->show_on_header= $request->show_on_header;

        $videocategory->status= $request->status;

        //$videocategory->time= $request->created_at->diffForHumans();


    // add other fields
        $videocategory->save();
    
    
    
            
        return redirect('/admin/videocategory')->with('successMsg', 'Category saved!');
    }


    public function edit($id)
    { 
        $videocategory=VideoCategory::findOrFail($id);
        return view('videocategory.edit',compact('videocategory'));
    }


    public function update(Request $request, $id)
    {
        $videocategory = VideoCategory::find($id);
         
        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }
        
        $slug = make_slug($request->name_bn);
       
       
        $videocategory->name_bn= $request->name_bn;
       
        
        $videocategory->slug_bn= $slug;
        
        
        $videocategory->show_on_header= $request->show_on_header;

        $videocategory->status= $request->status;

    // add other fields
    $videocategory->update();

            
    return redirect('/admin/videocategory')->with('successMsg', 'Category Update!');

    }




    public function destroy($id)
    {
        
        $user=VideoCategory::findOrFail($id);
        $user->delete();
     
        return redirect()->route('videocategory.index')->with('successMsg', 'Category delete!');
    }

}
