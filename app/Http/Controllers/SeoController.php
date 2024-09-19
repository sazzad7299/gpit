<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\seo;

class SeoController extends Controller
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
        $seos=seo::first();
        return view('seo.edit',compact('seos'));
    }

    public function update(Request $request, $id)
    {


        $seos = seo::find($id); 
      

     


        $seos->meta_title= $request->meta_title;
        $seos->meta_tag= $request->meta_tag;
        
    
        
        $seos->meta_des= $request->meta_des;

        $seos->meta_author= $request->meta_author;

        $seos->google_analyies= $request->google_analyies;

        $seos->google_verification= $request->google_verification;

        $seos->bing_verification= $request->bing_verification;

        $seos->alexa_analyties= $request->alexa_analyties;
        
        $seos->meta_box= $request->meta_box;
        $seos->image_alt= $request->image_alt;

        $seos->keyword= $request->keyword;


    // add other fields
    $seos->update();

            
   // return redirect('/admin/sociallink')->with('successMsg', 'settings Update!');
   return redirect()->back()->with('successMsg', 'sociallinks Update!');

    }

}
