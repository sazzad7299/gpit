<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\designation;
use App\Category;

class WriterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //$catid=Auth::user()->category_id;  // [1,2,7]
        // =implode(',',$catid)
        //->where('role_id',2)
        //->join('categories','users.category_id', '=','categories.id')
        //->select('users.*', 'categories.name_en')
        $users = User::where('role_id',2)->get();
                 $categories=Category::all();
        return view('writers.index',compact('users','categories'));

    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'bangla_name' => 'required',
          
            'password' => 'required',
            'email' => 'required|unique:users'
        ]);

         $user=new User();
        
         $user->bangla_name=$request->bangla_name;
       
         $user->email=$request->email;
         //$user->password=bcrypt('$request->password');
         $user->password=Hash::make($request->password);
         $user->designation=$request->designation;
         //$user->category_id=json_encode($request->category_id);

         //$user->categories()->attach($request->category_id);
         $user->status= $request->status;
         $user->role_id= 2;

         $user->save();
    
    
    
            
        return redirect('/admin/writer')->with('successMsg', 'Contact saved!');
    }

    public function edit($id)
    {
        $categories=Category::all();
        $writers=User::find($id);
        return view('writers.edit',compact('writers','categories'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'bangla_name' => 'required',
            
            'password' => 'required',
            'email' => 'required'
        ]);
        $user=User::findOrFail($id);
        
        $user->bangla_name=$request->bangla_name;
        $user->email=$request->email;
        //$user->password=bcrypt('$request->password');
        $user->password=Hash::make($request->password);
        $user->designation=$request->designation;
        $user->status= $request->status;
        $user->role_id= 2;

        $user->update();
   
   
   
           
       return redirect('/admin/writer')->with('success', 'Contact saved!');
    }

    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();
     
        return redirect()->route('writer.index')->with('successMsg', 'Contact Delete!');
    }

}
