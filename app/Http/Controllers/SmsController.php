<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\application;
class SmsController extends Controller
{
    public function sentsmsuser(Request $request,$id)
    {
       
        
        
        $this->validate($request,[
            'message_text' => 'required',
        ]);

        $application = application::find($id);
            
       
        $url = "http://66.45.237.70/api.php";
        $number=$application->a_number;
        $name=$request->a_name;
        $text=$request->message_text;
        $data= array(
        'username'=>"aminul.ciu",
        'password'=>"N2CV7KHR",
        'number'=>"$number",
        'message'=>"$text"
        );

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|",$smsresult);
        $sendstatus = $p[0];
        return redirect()->back();
       
    }

    

}
