<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/login', function () {
    return redirect()->route('login');
});



Route::get('/terms', function () {
    return view('frontend.terms');
});

Route::get('/p', function () {
    return view('frontend.page');
});

Route::get('/privacy-policy', function () {
    return view('frontend.privacy-policy');
});


Route::get('/about', function () {
    return view('frontend.about');
});


Route::get('/contact', function () {
    return view('frontend.contact');
});
Route::get('update-siteinfo','Frontend\BlogController@updateinfo')->name('updateinfo');

Route::get('category/{slug}','Frontend\BlogController@cpost')->name('blog.cpost');

Route::get('allvideos/{slug}','Frontend\BlogController@vcpost')->name('blog.vcpost');

Route::get('subcategory/{slug}','Frontend\BlogController@subcat')->name('blog.subcat');

Route::get('get-free-quate','Frontend\BlogController@freequate')->name('blog.freequate');

Route::post('/emailstore','Frontend\BlogController@emailstore')->name('email.store');

Route::get('/postdetails/{id}/{slug_bn}','Frontend\BlogController@postdetails');

Route::get('/videodetails/{id}/{slug_bn}','Frontend\BlogController@videodetails');

Route::get('/allvideos','Frontend\BlogController@allvideos')->name('allvideos');

Route::post('/authorstore','Frontend\BlogController@authorstore')->name('author.store');
//website
Route::get('/','Frontend\BlogController@index')->name('blog.index');
Route::get('/{f_slug}','Frontend\BlogController@pagedetails');
Route::get('page/{slug}','Frontend\BlogController@pageview')->name('page.view');

Auth::routes();
//password change
Route::get('password-change','Auth\ChangedPasswordController@edit')->name('password.edit');
Route::put('password-change','Auth\ChangedPasswordController@updatepassword')->name('manual.password.update');

        Route::post('/applystore','Frontend\BlogController@applystore')->name('apply.store');
        Route::post('/update-status/{id}', 'Frontend\BlogController@updateStatus');

Route::get('/home', 'HomeController@index')->name('home');


//sarch
Route::get('/search','Frontend\BlogController@search')->name('search');


Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function(){

    Route::get('dashboard','Admin\DashboardController@index')->name('admin.dashboard');
    Route::resource('category', 'CategoryController');
    Route::resource('videocategory', 'VideoCategoryController');
    Route::resource('designation', 'DesignationController');

    Route::resource('program', 'ProgramController');

    Route::resource('page', 'PageController');

    Route::resource('website', 'FrontendController');


Route::get('/website', 'FrontendController@index')->name('website.index');
Route::get('/website/create', 'FrontendController@create')->name('website.create');
Route::post('/website', 'FrontendController@store')->name('website.store');
Route::get('/website/{website}', 'FrontendController@show')->name('website.show');
Route::get('/website/{website}/edit', 'FrontendController@edit')->name('website.edit');
Route::put('/website/{website}', 'FrontendController@update')->name('website.update');
Route::delete('/website/{website}', 'FrontendController@destroy')->name('website.destroy');



    Route::get('live-edit', 'LiveController@index')->name('live.edit');
    Route::post('live-update/{id}', 'LiveController@update')->name('live.update');
    Route::resource('subcategory', 'SubcategoryController');
    Route::resource('writer', 'WriterController');
    Route::resource('post', 'PostController');

    Route::get('post/act/{id}','PostController@act')->name('post.act');

    Route::get('post/det/{id}','PostController@det')->name('post.det');

    //ajax request
    Route::get('post/create/GetSubCatAgainstMainCatEdit/{id}', 'PostController@GetSubCatAgainstMainCatEdit');

    //adds
    Route::resource('google_add', 'GoogleController');
    Route::resource('img_add', 'imgaddController');
    Route::resource('verticaladd', 'VerticalAddController');



    Route::get('sociallink-edit', 'SocialController@index')->name('sociallink.edit');
    Route::post('sociallink-update/{id}', 'SocialController@update')->name('sociallink.update');

    //setting route

    Route::get('setting-edit', 'SettingController@index')->name('setting.edit');
    Route::post('setting-update/{id}', 'SettingController@update')->name('setting.update');

      //setting route

      Route::get('about-edit', 'aboutController@index')->name('about.edit');
      Route::post('about-update/{id}', 'aboutController@update')->name('about.update');


    //seo route

    Route::get('seo-edit', 'SeoController@index')->name('seo.edit');
    Route::post('seo-update/{id}', 'SeoController@update')->name('seo.update');





    //Reports

    Route::get('todayreport','ReportController@todayreport')->name('todayreport');

    Route::get('thismonthreport','ReportController@thismonthreport')->name('thismonthreport');

    Route::get('thisyear','ReportController@thisyear')->name('thisyear');

    Route::get('reportindex','ReportController@reportindex')->name('reportindex');



        Route::resource('application', 'ApplicationController');



    //password change
    Route::get('password-change','SettingController@passwordchange')->name('password.change');
    Route::put('password-update','SettingController@updatePassword')->name('password.update');

      Route::post('sentsmsuser/{id}', 'SmsController@sentsmsuser')->name('sentsmsuser');

   });





//    Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function (){
//    Route::get('dashboard','DashboardController@index')->name('dashboard');

// });


Route::group(['as'=>'author.','prefix'=>'author','namespace'=>'Author','middleware'=>['auth','author']], function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('post', 'PostController');

    Route::get('deactivepost', 'PostController@deactivepost')->name('deactivepost');



});

 //ajax request
Route::get('post/create/GetSubCatAgainstMainCatEdit/{id}', 'PostController@GetSubCatAgainstMainCatEdit');

//invoice
Route::get('admin/invoices/index', 'InvoiceController@index')->name('admin.invoices.index');
Route::get('admin/invoices/create', 'InvoiceController@create')->name('admin.invoices.create');
Route::get('admin/invoices/edit/{id}', 'InvoiceController@edit')->name('admin.invoices.edit');
Route::post('admin/invoices/store', 'InvoiceController@store')->name('admin.invoices.store');
Route::put('admin/invoices/update/{id}', 'InvoiceController@update')->name('admin.invoices.update');
Route::get('admin/invoices/print/{id}', 'InvoiceController@print')->name('admin.invoices.print');
Route::delete('admin/invoices/delete/{id}', 'InvoiceController@destroy')->name('admin.invoices.destroy');


Route::get('admin/invoices/dashboard', 'InvoiceController@dashboard')->name('admin.invoices.dashboard');

Route::post('admin/report', 'InvoiceController@report')->name('admin.report');



