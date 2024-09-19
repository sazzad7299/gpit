<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangedPasswordController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function edit(){
        return view('auth.passwords.change');
    }
    public function updatePassword(Request $request){
        $this->validate($request,[
            'old_password'=>'required',
            'password'=>'required|confirmed',
        ]);
        $hashedPassword = Auth::user()-> password;
        if(Hash::check($request->old_password,$hashedPassword)){
            if(!Hash::check($request->password,$hashedPassword)){
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                $notification=array(
                    'messege'=>'Successfully Password Changed ',
                    'alert-type'=>'success'
                );
                Auth::logout();
                return Redirect()->back()->with($notification);

            }else{
                $notification=array(
                    'messege'=>'New password can not same as old password!',
                    'alert-type'=>'warning'
                );
                return Redirect()->back()->with($notification);
            }
        }else{
            $notification=array(
                'messege'=>'Current password does not match!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
