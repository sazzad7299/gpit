<?php

namespace App\Http\Controllers;

use App\frontend;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use App\Page;
class FrontendController extends Controller
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
        $rows=frontend::orderBy('id', 'desc')->get();
        return view('website.index',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages=Page::orderBy('id', 'desc')->get();
        return view('website.create',compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'short_description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $website= new frontend();
        function make_slug($string) {
            return preg_replace('/\s+/u', ',', trim($string));
        }
        function make_keyword($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }

        $image = $request->file('image');
        $slug = make_slug($request->name);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();


            if (!file_exists('uploads/website'))
            {
                mkdir('uploads/website',0777,true);
            }
             $image->move('uploads/website/',$imageName);

            //Image::make($image)->resize(400, 400)->save('uploads/website/'.$imageName);




        } else {
            $imageName = "default.png";
        }



        $keyword = make_keyword($request->name);



        $website->tag= $request->tag;



        $website->name= $request->name;
         $website->button= $request->button;
        $website->f_slug= $keyword;





        $website->short_description= $request->short_description;


        $website->description= $request->description;



        $website->page_id= $request->page_id;
         $website->meta_box= $request->meta_box;
          $website->image_alt= $request->image_alt;


        $website->image = $imageName;

        $website->save();

        return redirect()->route('website.index')->with('successMsg', 'website  saved!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row=frontend::findOrFail($id);
        return view('website.show',compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fronted=frontend::findOrFail($id);

        $pages=Page::all();
        return view('website.edit',compact('fronted','pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $website)
    {




        $this->validate($request,[
            'name' => 'required',
           'short_description' => 'required',

         ]);

        $slide=DB::table('pages')->first();

        $website = frontend::find($website);



                if ($request->image != Null) {
                    $image = $request->file('image');
                    function make_slug($string) {
                        return preg_replace('/\s+/u', ',', trim($string));
                    }
                    $slug = make_slug($request->name);

                    if(isset($image))
                    {
                        $currentDate = Carbon::now()->toDateString();
                        $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();


                        if (!file_exists('uploads/website'))
                        {
                            mkdir('uploads/website',0777,true);
                        }




                            $image->move('uploads/website/',$imageName);
                           // Image::make($image)->resize(400, 400)->save('uploads/website/'.$imageName);




                    } else {
                        $imageName = "default.png";
                    }
                }



                function make_keyword($string) {
                    return preg_replace('/\s+/u', '-', trim($string));
                }


        $keyword = make_keyword($request->name);

          $website->button= $request->button;

        $website->tag= $request->tag;


        $website->f_slug= $request->f_slug;


         $website->number= $request->number;

        $website->name= $request->name;


        $website->short_description= $request->short_description;


        $website->description= $request->description;

        $website->icon= $request->icon;

            $website->meta_box= $request->meta_box;
          $website->image_alt= $request->image_alt;

        $website->page_id= $request->page_id;

        if ($request->image != null) {
            $website->image = $imageName;
        }

        $website->update();

        return redirect()->route('website.index')->with('successMsg', 'website  update!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {

        $website = frontend::find($id);
        if (file_exists('uploads/website/'.$website->image))
        {
            unlink('uploads/website/'.$website->image);
        }
        $website->delete();

        return redirect()->route('website.index')->with('successMsg', 'website delete!');
    }

}
