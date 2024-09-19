<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use Carbon\Carbon;

use App\post;
use App\Category;
use App\Subcategory;
use App\User;
use Auth;

class postController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts=post::orderBy('id', 'desc')->get();
       
        return view('post.index',compact('posts'));
        
    }

    
    public function create()
    {
     
        $posts=post::all();
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $users=User::all();
        return view('post.create',compact('posts','categories','subcategories','users'));
       
    }

    public function GetSubCatAgainstMainCatEdit($id){
        

        echo json_encode(DB::table('subcategories')->where('category_id', $id)->get());
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'title_bn' => 'required|unique:posts',
            'details_bn' => 'required',
            'tages_bn' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
           
            'image' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $posts= new post();
        

        $image = $request->file('image');
        $slug = Str::of($request->title);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            //if(!Storage::disk('public')->exists('post'))
            //{
            //    Storage::disk('public')->makeDirectory('post');
            //}
            if (!file_exists('uploads/post'))
            {
                mkdir('uploads/post',0777,true);
            }
            //$image->move('uploads/item',$imagename);

          
           // $img = Image::make('public/foo.jpg')->resize(320, 240)->insert('public/watermark.png');
            //Image::make($image)->resize(500, 333)->save(storage_path('app/public/post/') .$imageName);
            Image::make($image)->resize(730, 446)->insert(('images/backround.png'), 'bottom',30,30)->save('uploads/post/'.$imageName);

        } else {
            $imageName = "default.png";
        }
       
        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }
        
        $slug = make_slug($request->title_bn);
     
        

        $posts->slug_bn= $slug;
     

      
        $posts->title_bn= $request->title_bn;
        
        
        $posts->details_bn= $request->details_bn;

        $posts->details_bn_1= $request->details_bn_1;

        $posts->details_bn_2= $request->details_bn_2;

       
        $posts->tages_bn= $request->tages_bn;

       
        $posts->published_date = Carbon::now()->toDateString();

        $posts->category_id= $request->category_id;
        $posts->subcategory_id= $request->subcategory_id;
      
        $posts->user_id = Auth::id();

        $posts->image = $imageName;
      
        $posts->status= $request->status;
         $posts->breaking=1;
        $posts->thumbnail=1;


        $posts->save();
    
    
    
            
        return redirect('/admin/post')->with('successMsg', 'Visa detalis saved!');
    }
    
    public function act($id)
    {
        $posts=post::findOrFail($id);
        $posts->status= 2;
        $posts->update();
        return redirect('/admin/post')->with('successMsg', 'detalis Active saved!');
    }

    public function det($id)
    {
        $posts=post::findOrFail($id);
        $posts->status= 1;
        $posts->update();
        return redirect('/admin/post')->with('successMsg', 'detalis deactive saved!');
    }

    public function edit($id)
    { 
        $posts=post::findOrFail($id);
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $users=User::all();
        return view('post.edit',compact('posts','categories','subcategories','users'));
    }

    public function update(Request $request, $id)
    {
       
        
        $this->validate($request,[
          
        ]);
            
          

        $posts = post::find($id); 

        if ( $request->image==null)
        {
       }
       else{

       
            $image = $request->file('image');
            $slug = Str::of($request->title);
            if(isset($image))
            {
    //            make unipue name for image
                $currentDate = Carbon::now()->toDateString();
                $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
    
                //if(!Storage::disk('public')->exists('post'))
                //{
                //    Storage::disk('public')->makeDirectory('post');
                //}
                if (!file_exists('uploads/post'))
                {
                    mkdir('uploads/post',0777,true);
                }
                //$image->move('uploads/item',$imagename);
    
              
               // $img = Image::make('public/foo.jpg')->resize(320, 240)->insert('public/watermark.png');
                //Image::make($image)->resize(500, 333)->save(storage_path('app/public/post/') .$imageName);
                Image::make($image)->resize(730, 446)->insert(('images/backround.png'), 'bottom',30,30)->save('uploads/post/'.$imageName);
    
            } else {
                $imageName = "default.png";
            }
        }
       
      

      
        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }
        
        $slug = make_slug($request->title_bn);
     

        $posts->slug_bn= $slug;
       

        
        $posts->title_bn= $request->title_bn;
        
       
        $posts->details_bn= $request->details_bn;

        $posts->details_bn_1= $request->details_bn_1;

        $posts->details_bn_2= $request->details_bn_2;

       
        $posts->tages_bn= $request->tages_bn;
         $posts->breaking= $request->breaking;

       
        $posts->published_date = Carbon::now()->toDateString();

        $posts->category_id= $request->category_id;
        $posts->subcategory_id= $request->subcategory_id;
        $posts->user_id = Auth::id();

       
      
        $posts->status= $request->status;

        $posts->thumbnail= $request->thumbnail;

        if ( $request->image==null)
         {
        }
        else{
            $posts->image = $imageName;
        }

       
        $posts->update();

            
        return redirect('/admin/post')->with('successMsg', 'visa detalis Update!');

    }



    public function show($id)
    {
     
        $post=post::findOrFail($id);
        return view('post.show',compact('post'));
    }




    public function destroy( $id)
    {
        

        // $post = post::find($id);
        // if (Storage::disk('public')->exists('post/'.$post->image))
        // {
        //     Storage::disk('public')->delete('post/'.$post->image);
        // }
     
        // $post->delete();

        $post = post::find($id);
        if (file_exists('uploads/post/'.$post->image))
        {
            unlink('uploads/post/'.$post->image);
        }
        $post->delete();
     
        return redirect()->route('post.index')->with('successMsg', 'visa detalis delete!');
    }


}
