<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\User;
use App\Models\Banner;
use App\Models\Category;
use App\Models\MainImage;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
        $main_image=MainImage::firstOrFail();
        $posts=Post::where('isActive',1)->with('categories')->latest()->get();
        $popular_posts=Post::where('isActive',1)->latest('views')->take(6)->get();
        $recent_posts=Post::where('isActive',1)->latest('created_at')->with('categories')->take(3)->get();
        $editor_posts=Post::where('isActive',1)->where('isEditor',1)->take(4)->latest('created_at')->get();
        $random_category=Category::inRandomOrder()->firstOrFail();
        $random_posts_id=CategoryPost::where('category_id',$random_category->id)->take(4)->pluck('post_id');
        $random_posts=Post::where('isActive',1)->whereIn('id',$random_posts_id)->with('categories')->get();
        $banners=Banner::where('isShow',1)->take(2)->get();
        $users=User::get();

        return view('user.index',compact('main_image','posts','popular_posts','recent_posts','editor_posts','random_posts','random_category','banners','users'));
    }
}

