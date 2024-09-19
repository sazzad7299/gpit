<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\sociallink;

class SocialController extends Controller
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
        $sociallinks=sociallink::first();
        return view('sociallink.edit',compact('sociallinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $sociallinks=sociallink::findOrFail($id);
        // return view('sociallink.edit',compact('sociallinks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sociallinks = sociallink::find($id); 
      
        $sociallinks->fb= $request->fb;
        $sociallinks->twi= $request->twi;
        
    
        
        $sociallinks->insta= $request->insta;

        $sociallinks->yout= $request->yout;

        $sociallinks->vid= $request->vid;

        $sociallinks->fli= $request->fli;

    // add other fields
    $sociallinks->update();

            
   // return redirect('/admin/sociallink')->with('successMsg', 'sociallinks Update!');
   return redirect()->back()->with('successMsg', 'sociallinks Update!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
