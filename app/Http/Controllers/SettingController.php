<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use Carbon\Carbon;
use App\User;
use App\settings;
use Auth;
class SettingController extends Controller
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
        $settings=settings::first();
        return view('setting.edit',compact('settings'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'number' => 'required',
           
        ]);

        $settings = settings::find($id); 
      

       $image = $request->file('image');
        $slug = Str::of($request->number);
        
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            //if(!Storage::disk('public')->exists('post'))
            //{
            //    Storage::disk('public')->makeDirectory('post');
            //}
            if (!file_exists('uploads/logo'))
            {
                mkdir('uploads/logo',0777,true);
            }
            //$image->move('uploads/item',$imagename);

          
           // $img = Image::make('public/foo.jpg')->resize(320, 240)->insert('public/watermark.png');
            //Image::make($image)->resize(500, 333)->save(storage_path('app/public/logo/') .$imageName);
            Image::make($image)->resize(138, 32)->save('uploads/logo/'.$imageName);

        } else {
            $imageName = "default.png";
        }
       
       


        $settings->fb_page= $request->fb_page;
        $settings->yout_channel= $request->yout_channel;
        
    
        
        $settings->address= $request->address;

        $settings->number= $request->number;

        $settings->email= $request->email;

         $settings->image = $imageName;

    // add other fields
    $settings->update();

            
   // return redirect('/admin/sociallink')->with('successMsg', 'settings Update!');
   return redirect()->back()->with('successMsg', 'sociallinks Update!');

    }

    public function passwordchange()
    {
        $users=User::first();
        return view('change_password.edit',compact('users'));
    }

   
    public function updatePassword(Request $request)
    {
        $this->validate($request,[
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password,$hashedPassword))
        {
            if (!Hash::check($request->password,$hashedPassword))
            {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                return redirect()->back()->with('Password Successfully Changed','Success');
            } else {
                return redirect()->back()->with('New password cannot be the same as old password.','Error');

            }
        } else {
            return redirect()->back()->with('Current password not match.','Error');
        }

    }


}
