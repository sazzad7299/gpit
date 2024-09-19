<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Img_adds;

class imgaddController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $img_adds=Img_adds::all();
       
        return view('img_add.index',compact('img_adds'));
        
    }

    
    

    public function store(Request $request)
    {
       

        $img_adds= new Img_adds();
        

        $image = $request->file('image');
        $slug = Str::of($request->types);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            //if(!Storage::disk('public')->exists('img_add'))
            //{
            //    Storage::disk('public')->makeDirectory('img_add');
            //}
            if (!file_exists('uploads/img_add'))
            {
                mkdir('uploads/img_add',0777,true);
            }
            //$image->move('uploads/item',$imagename);

          
           // $img = Image::make('public/foo.jpg')->resize(320, 240)->insert('public/watermark.png');
            //Image::make($image)->resize(500, 333)->save(storage_path('app/public/img_add/') .$imageName);
            if($request->types==1){
                Image::make($image)->resize(320, 266)->save('uploads/img_add/'.$imageName);
            }
            else{
                Image::make($image)->resize(728, 90)->save('uploads/img_add/'.$imageName);
            }
           

        } else {
            $imageName = "default.png";
        }
      
        $img_adds->types= $request->types;
        $img_adds->link= $request->link;

        $img_adds->image = $imageName;
      
        $img_adds->status= $request->status;

        $img_adds->save();
            
        return redirect('/admin/img_add')->with('successMsg', 'img_add saved!');
    }

    public function edit($id)
    { 
        $img_adds=Img_adds::findOrFail($id);
       
        return view('img_add.edit',compact('img_adds'));
    }

    public function update(Request $request, $id)
    {
       


        $img_adds = Img_adds::find($id); 
        $image = $request->file('image');
        $slug = Str::of($request->types);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            //if(!Storage::disk('public')->exists('img_add'))
            //{
            //    Storage::disk('public')->makeDirectory('img_add');
            //}
            if (!file_exists('uploads/img_add'))
            {
                mkdir('uploads/img_add',0777,true);
            }
            //$image->move('uploads/item',$imagename);

          
           // $img = Image::make('public/foo.jpg')->resize(320, 240)->insert('public/watermark.png');
            //Image::make($image)->resize(500, 333)->save(storage_path('app/public/img_add/') .$imageName);
            if($request->types==1){
                Image::make($image)->resize(320, 266)->save('uploads/img_add/'.$imageName);
            }
            else{
                Image::make($image)->resize(728, 90)->save('uploads/img_add/'.$imageName);
            }
        } else {
            $imageName = "default.png";
        }
      
        $img_adds->types= $request->types;
        $img_adds->link= $request->link;

        $img_adds->image = $imageName;
      
        $img_adds->status= $request->status;
        $img_adds->update();

            
        return redirect('/admin/img_add')->with('successMsg', 'img_add Update!');

    }





    public function destroy( $id)
    {
        

        $img_add = Img_adds::find($id);
        if (file_exists('uploads/img_add/'.$img_add->image))
        {
            unlink('uploads/img_add/'.$img_add->image);
        }
        $img_add->delete();
      
     
        return redirect()->route('img_add.index')->with('successMsg', 'img_add delete!');
    }

}
