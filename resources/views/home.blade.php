@extends('layouts.admin_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

@php
    
    $currentDAY = date('d');
     $post= App\post::count();
     $sector= App\Category::count();
     $type= App\Subcategory::count();
    $tpost = App\post::whereRaw('DAY(created_at) = ?',[$currentDAY])->count();
    $currentMonth = date('m');
    $mpost =  App\post::whereRaw('MONTH(created_at) = ?',[$currentMonth])->count();
    $currentYear = date('Y');
    $ypost = App\post::whereRaw('YEAR(created_at) = ?',[$currentYear])->count();
    $ppost= App\post::where('status',1)->count();
    $dpost= App\post::where('status',0)->count();
    $bpost= App\post::whereRaw('DAY(created_at) = ?',[$currentDAY])->where('breaking',1)->count();
    
@endphp

                

               

               
            </div>
        </div>
    </div>
</div>
@endsection
