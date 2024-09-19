<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

use Illuminate\Http\Request;

use App\VerticalAdd;

class VerticalAddController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $verticaladds=VerticalAdd::all();
       
        return view('verticaladd.index',compact('verticaladds'));
        
    }

    
    

    public function store(Request $request)
    {
       

        $verticaladds= new VerticalAdd();
        

        $image = $request->file('image');
        $slug = Str::of($request->types);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            //if(!Storage::disk('public')->exists('verticaladd'))
            //{
            //    Storage::disk('public')->makeDirectory('verticaladd');
            //}
            if (!file_exists('uploads/verticaladd'))
            {
                mkdir('uploads/verticaladd',0777,true);
            }
            //$image->move('uploads/item',$imagename);

          
           // $img = Image::make('public/foo.jpg')->resize(320, 240)->insert('public/watermark.png');
            //Image::make($image)->resize(500, 333)->save(storage_path('app/public/verticaladd/') .$imageName);
            if($request->types==1){
                Image::make($image)->resize(320, 266)->save('uploads/verticaladd/'.$imageName);
            }
            else{
                Image::make($image)->resize(728, 90)->save('uploads/verticaladd/'.$imageName);
            }
           

        } else {
            $imageName = "default.png";
        }
      
        $verticaladds->types= $request->types;
        $verticaladds->link= $request->link;

        $verticaladds->image = $imageName;
      
        $verticaladds->status= $request->status;

        $verticaladds->save();
            
        return redirect('/admin/verticaladd')->with('successMsg', 'verticaladd saved!');
    }

    public function edit($id)
    { 
        $verticaladds=VerticalAdd::findOrFail($id);
       
        return view('verticaladd.edit',compact('verticaladds'));
    }

    public function update(Request $request, $id)
    {
       


        $verticaladds = VerticalAdd::find($id); 
        $image = $request->file('image');
        $slug = Str::of($request->types);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            //if(!Storage::disk('public')->exists('verticaladd'))
            //{
            //    Storage::disk('public')->makeDirectory('verticaladd');
            //}
            if (!file_exists('uploads/verticaladd'))
            {
                mkdir('uploads/verticaladd',0777,true);
            }
            //$image->move('uploads/item',$imagename);

          
           // $img = Image::make('public/foo.jpg')->resize(320, 240)->insert('public/watermark.png');
            //Image::make($image)->resize(500, 333)->save(storage_path('app/public/verticaladd/') .$imageName);
            if($request->types==1){
                Image::make($image)->resize(320, 266)->save('uploads/verticaladd/'.$imageName);
            }
            else{
                Image::make($image)->resize(728, 90)->save('uploads/verticaladd/'.$imageName);
            }
        } else {
            $imageName = "default.png";
        }
      
        $verticaladds->types= $request->types;
        $verticaladds->link= $request->link;

        $verticaladds->image = $imageName;
      
        $verticaladds->status= $request->status;
        $verticaladds->update();

            
        return redirect('/admin/verticaladd')->with('successMsg', 'verticaladd Update!');

    }





    public function destroy( $id)
    {
        

        $verticaladd = VerticalAdd::find($id);
        if (file_exists('uploads/verticaladd/'.$verticaladd->image))
        {
            unlink('uploads/verticaladd/'.$verticaladd->image);
        }
        $verticaladd->delete();
      
     
        return redirect()->route('verticaladd.index')->with('successMsg', 'verticaladd delete!');
    }

}
