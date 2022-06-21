<?php

use App\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\MainImageController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\ImportantLinkController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\User\CategoryController as UserCategoryController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\ContactController as UserContactController;
use App\Http\Controllers\User\IndexController as UserIndexController;
use App\Http\Controllers\User\LikeController;
use App\Http\Controllers\User\PostController as UserPostController;
use App\Models\ContactUs;

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

Route::get('language/{locale}',function($locale){
    app()->setLocale($locale);
    session()->put('locale',$locale);
    return redirect()->back();
})->name('locale');

route::get('/comment/{post}',[CommentController::class,'store'])->name('user.comment.store');
route::get('/like{post}',[LikeController::class,'like'])->name('user.post.like');


route::get('/post/{slug}',[UserPostController::class,'show'])->name('user.post.show');
route::get('/category',[UserCategoryController::class,'index'])->name('user.category.index');
route::get('/category/{slug}',[UserCategoryController::class,'show'])->name('user.category.show');


Route::get('/',[UserIndexController::class,'index'])->name('user.index');
Route::get('/contact',[UserContactController::class,'contact'])->name('user.contact');
Route::post('/contact-us',[UserContactController::class,'post_contact'])->name('user.post_contact');

Route::get('/login',[AuthController::class,'login'])->name('user.login');
Route::post('/login',[AuthController::class,'post_login'])->name('user.post_login');

Route::get('/register',[AuthController::class,'register'])->name('user.register');
Route::post('/register',[AuthController::class,'post_register'])->name('user.post_register');
Route::get('/sign_out',[AuthController::class,'sign_out'])->name('user.sign_out');


Route::get('/admin/login',[AdminAuthController::class,'login'])->name('admin.login');
Route::post('/admin/login',[AdminAuthController::class,'post_login'])->name('admin.post_login');


Route::get('/search',[UserPostController::class,'search'])->name('search');



Route::group(['middleware'=>'isAdmin','prefix'=>'admin','as'=>'admin.'],function(){ 
    Route::get('/',[IndexController::class,'index'])->name('index');
    Route::group(['prefix'=>'role','as'=>'role.'],function(){
        Route::get('/',[RoleController::class,'index'])->name('index');
        Route::get('/create',[RoleController::class,'create'])->name('create');
        Route::post('/store}',[RoleController::class,'store'])->name('store');
        Route::get('/edit/{role}',[RoleController::class,'edit'])->name('edit');
        Route::post('/update/{role}',[RoleController::class,'update'])->name('update');
        Route::get('/delete/{role}',[RoleController::class,'destroy'])->name('destroy');
        Route::get('/active/{role}',[RoleController::class,'active'])->name('active');
    });

    Route::group(['prefix'=>'user','as'=>'user.'],function(){

        Route::get('/',[UserController::class,'index'])->name('index');
        Route::get('/create',[UserController::class,'create'])->name('create');
        Route::post('/store}',[UserController::class,'store'])->name('store');
        Route::get('/edit/{user}',[UserController::class,'edit'])->name('edit');
        Route::post('/update/{user}',[UserController::class,'update'])->name('update');
        Route::get('/delete/{user}',[UserController::class,'destroy'])->name('destroy');
        Route::get('/active/{user}',[UserController::class,'active'])->name('active');
    });

    Route::group(['prefix'=>'banner','as'=>'banner.'],function(){

        Route::get('/',[BannerController::class,'index'])->name('index');
        Route::get('/create',[BannerController::class,'create'])->name('create');
        Route::post('/store}',[BannerController::class,'store'])->name('store');
        Route::get('/edit/{banner}',[BannerController::class,'edit'])->name('edit');
        Route::post('/update/{banner}',[BannerController::class,'update'])->name('update');
        Route::get('/delete/{banner}',[BannerController::class,'destroy'])->name('destroy');
        Route::get('/active/{banner}',[BannerController::class,'active'])->name('active');
    });

    Route::group(['prefix'=>'important_link','as'=>'important_link.'],function(){

        Route::get('/',[ImportantLinkController::class,'index'])->name('index');
        Route::get('/create',[ImportantLinkController::class,'create'])->name('create');
        Route::post('/store}',[ImportantLinkController::class,'store'])->name('store');
        Route::get('/edit/{important_link}',[ImportantLinkController::class,'edit'])->name('edit');
        Route::post('/update/{important_link}',[ImportantLinkController::class,'update'])->name('update');
        Route::get('/delete/{important_link}',[ImportantLinkController::class,'destroy'])->name('destroy');
    });


    Route::group(['prefix'=>'category','as'=>'category.'],function(){

        Route::get('/',[CategoryController::class,'index'])->name('index');
        Route::get('/create',[CategoryController::class,'create'])->name('create');
        Route::post('/store}',[CategoryController::class,'store'])->name('store');
        Route::get('/edit/{category}',[CategoryController::class,'edit'])->name('edit');
        Route::post('/update/{category}',[CategoryController::class,'update'])->name('update');
        Route::get('/delete/{category}',[CategoryController::class,'destroy'])->name('destroy');
        Route::get('/active/{category}',[CategoryController::class,'active'])->name('active');
    });

    Route::group(['prefix'=>'social_media','as'=>'social_media.'],function(){

        Route::get('/',[SocialMediaController::class,'index'])->name('index');
        Route::get('/create',[SocialMediaController::class,'create'])->name('create');
        Route::post('/store}',[SocialMediaController::class,'store'])->name('store');
        Route::get('/edit/{social_media}',[SocialMediaController::class,'edit'])->name('edit');
        Route::post('/update/{social_media}',[SocialMediaController::class,'update'])->name('update');
        Route::get('/delete/{social_media}',[SocialMediaController::class,'destroy'])->name('destroy');
    }); 


    Route::group(['prefix'=>'contact','as'=>'contact.'],function(){
        Route::get('/edit/{contact}',[ContactController::class,'edit'])->name('edit');
        Route::post('/update/{contact}',[ContactController::class,'update'])->name('update');
      
    }); 

    Route::group(['prefix'=>'main_image','as'=>'main_image.'],function(){
        Route::get('/edit/{main_image}',[MainImageController::class,'edit'])->name('edit');
        Route::post('/update/{main_image}',[MainImageController::class,'update'])->name('update');
    });


    Route::group(['prefix'=>'setting','as'=>'setting.'],function(){
        Route::get('/edit/{setting}',[SettingController::class,'edit'])->name('edit');
        Route::post('/update/{setting}',[SettingController::class,'update'])->name('update');
    });

    Route::group(['prefix'=>'tag','as'=>'tag.'],function(){

        Route::get('/',[TagController::class,'index'])->name('index');
        Route::get('/create',[TagController::class,'create'])->name('create');
        Route::post('/store}',[TagController::class,'store'])->name('store');
        Route::get('/edit/{tag}',[TagController::class,'edit'])->name('edit');
        Route::post('/update/{tag}',[TagController::class,'update'])->name('update');
        Route::get('/delete/{tag}',[TagController::class,'destroy'])->name('destroy');
    });


    Route::group(['prefix'=>'post','as'=>'post.'],function(){

        Route::get('/',[PostController::class,'index'])->name('index');
        Route::get('/create',[PostController::class,'create'])->name('create');
        Route::post('/store}',[PostController::class,'store'])->name('store');
        Route::get('/edit/{post}',[PostController::class,'edit'])->name('edit');
        Route::post('/update/{post}',[PostController::class,'update'])->name('update');
        Route::get('/delete/{post}',[PostController::class,'destroy'])->name('destroy');
        Route::get('/active/{post}',[PostController::class,'active'])->name('active');
    });


    Route::group(['prefix'=>'contact_us','as'=>'contact_us.'],function(){

        Route::get('/',[ContactUsController::class,'index'])->name('index');
        Route::get('/show{contact_us}',[ContactUsController::class,'show'])->name('show');
    });


    Route::group(['prefix'=>'comment','as'=>'comment.'],function(){

        Route::get('/',[AdminCommentController::class,'index'])->name('index');
        Route::get('/show{comment}',[AdminCommentController::class,'show'])->name('show');
        Route::get('/delete/{comment}',[AdminCommentController::class,'destroy'])->name('destroy');
        Route::get('/active/{comment}',[AdminCommentController::class,'active'])->name('active');
    });


    route::get('/logout',[AdminAuthController::class,'logout'])->name('logout');


});



