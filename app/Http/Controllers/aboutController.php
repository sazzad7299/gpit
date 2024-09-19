<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use Carbon\Carbon;

use App\About;

class aboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts=About::first();
        return view('about.edit',compact('abouts'));
    }

    public function update(Request $request, $id)
    {


        $abouts = About::find($id); 
      
        // if (file_exists('uploads/about/'.$abouts->image))
        // {
        //     unlink('uploads/about/'.$abouts->image);
        // }
        

        

        $image = $request->file('image');
        $slug = Str::slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/about'))
            {
                mkdir('uploads/about',0777,true);
            }
            $image->move('uploads/about',$imagename);
        }else{
            $imagename = "default.png";
        }
       


        $image1 = $request->file('image1');
        $slug = Str::slug($request->name);
        if (isset($image1))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename1 = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image1->getClientOriginalExtension();

            if (!file_exists('uploads/about'))
            {
                mkdir('uploads/about',0777,true);
            }
            $image1->move('uploads/about',$imagename1);
        }else{
            $imagename1 = "default.png";
        }
       


        $abouts->name= $request->name;
        $abouts->about= $request->about;
        $abouts->location= $request->location;
        
         $abouts->meta_box= $request->meta_box;
          $abouts->image_alt= $request->image_alt;
        
    
        
       
        $abouts->twi= $request->twi;

        $abouts->insta= $request->insta;
        $abouts->yout= $request->yout;
        $abouts->number= $request->number;
        if ($request->image!=null) {
            $abouts->image = $imagename;

        }
         if ($request->image1!=null) {
            $abouts->image1 = $imagename1;
         }
        

    // add other fields
    $abouts->update();

            
   // return redirect('/admin/sociallink')->with('successMsg', 'abouts Update!');
   return redirect()->back()->with('successMsg', 'sociallinks Update!');

    }
}
