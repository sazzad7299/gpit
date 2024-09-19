<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use Illuminate\Support\Str;

use App\Program;
use App\VideoCategory;
use LaravelVideoEmbed;


class ProgramController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $programs=Program::all();
        $categories=VideoCategory::all();
        
        return view('programs.index',compact('programs','categories'));
        
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name_bn' => 'required',
            'program_video' => 'required',
           
        ]);

        $programs= new Program();
        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }
        
        $slug = make_slug($request->name_bn);
       
       
        $programs->name_bn= $request->name_bn;
       
        
        $programs->slug_bn= $slug;
       
        
        //$programs->program_video= $request->program_video;

        $programs->status= $request->status;

        //$programs->time= $request->created_at->diffForHumans();


        //URL to be used for embed generation
$url = $request->program_video;

//Optional array of website names, if present any websites not in the array will result in false being returned by the parser
$whitelist = ['YouTube', 'Vimeo'];

//Optional parameters to be appended to embed
$params = [
    'autoplay' => 1,
    'loop' => 1
  ];

//Optional attributes for embed container
$attributes = [
  'type' => null,
  'class' => 'iframe-class',
  'data-html5-parameter' => true
];

//return LaravelVideoEmbed::parse($url, $whitelist);
// "<iframe src="https://www.youtube.com/embed/8eK-5ivYb3o?wmode=transparent" type="text/html" width="480" height="295" frameborder="0" allowfullscreen></iframe>"

//return LaravelVideoEmbed::parse($url);
// "<iframe src="https://www.youtube.com/embed/8eK-5ivYb3o?wmode=transparent" type="text/html" width="480" height="295" frameborder="0" allowfullscreen></iframe>"

//return LaravelVideoEmbed::parse($url, ['Vimeo']);
// false

$programs->program_video =  LaravelVideoEmbed::parse($url, $whitelist, $params, $attributes);
//<iframe src="https://www.youtube.com/embed/8eK-5ivYb3o?wmode=transparent&amp;autoplay=1&amp;loop=1" type="" width="480" height="295" frameborder="0" allowfullscreen class="iframe-class" data-html5-parameter></iframe>

    $programs->image =  LaravelVideoEmbed::getYoutubeThumbnail($url);
//https://<youtube image thumbnail with max resolution>. usage: <img src="{{ LaravelVideoEmbed::getYoutubeThumbnail($url) }}"> 



    // add other fields
    $programs->pro_category =$request->category_id;
        $programs->save();
    
    
    
            
        return redirect('/admin/program')->with('successMsg', 'program saved!');
    }


    public function edit($id)
    { 
        $programs=Program::findOrFail($id);
        $categories=VideoCategory::all();
        return view('programs.edit',compact('programs','categories'));
    }


    public function update(Request $request, $id)
    {
        $programs = Program::find($id);
         
        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }
        
        $slug = make_slug($request->name_bn);
       
       
        $programs->name_bn= $request->name_bn;
       
        
        $programs->slug_bn= $slug;
        
        
        $programs->program_video= $request->program_video;

        $programs->status= $request->status;
     
       
    $programs->pro_category =$request->category_id;
    $programs->update();

            
    return redirect('/admin/program')->with('successMsg', 'program Update!');

    }

    public function destroy($id)
    {
        
        $user=Program::findOrFail($id);
        $user->delete();
     
        return redirect()->route('program.index')->with('successMsg', 'program delete!');
    }

    
}
