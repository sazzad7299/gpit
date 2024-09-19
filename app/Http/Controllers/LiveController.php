<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Live;

class LiveController extends Controller
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
        $lives=Live::first();
        return view('live.edit',compact('lives'));
    }

    public function update(Request $request, $id)
    {


        $lives = Live::find($id); 
        $lives->live_link= $request->live_link;
        $lives->status= 1;


    // add other fields
    $lives->update();

            
   // return redirect('/admin/sociallink')->with('successMsg', 'settings Update!');
   return redirect()->back()->with('successMsg', 'sociallinks Update!');

    }

    

}
