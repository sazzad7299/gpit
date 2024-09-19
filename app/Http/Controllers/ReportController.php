<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use Carbon\Carbon;
class ReportController extends Controller
{
    public function todayreport()
    {
        $currentDAY = date('d');
        $posts = post::whereRaw('DAY(created_at) = ?',[$currentDAY])
            ->get();
         return view('post.index',compact('posts'));
    }

    public function thismonthreport()
    {
        $currentMonth = date('m');
        $posts = post::whereRaw('MONTH(created_at) = ?',[$currentMonth])
            ->get();
        return view('post.index',compact('posts'));

    }

    public function thisyear()
    {
        $currentYear = date('Y');
        $posts = post::whereRaw('YEAR(created_at) = ?',[$currentYear])
            ->get();
        return view('post.index',compact('posts'));

    }

    public function reportindex()
    {
        $posts=Post::all();
       
        return view('post.report',compact('posts'));

    }
}
