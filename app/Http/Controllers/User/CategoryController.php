<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\Category;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){
       
        $categories=Category::where('isActive',1)->get();
        return view('user.category.index',compact('categories'));
    }

    public function show($slug){
        
        $categories=Category::where('slug','Like','%'.$slug.'%')->where('isActive',1)->firstOrFail();
        $category_post=CategoryPost::where('category_id',$categories->id)->pluck('post_id');
        $posts=Post::whereIn('id',$category_post)->with('categories')->latest()->paginate(3);
        return view('user.category.show',compact('posts','categories'));
       
    }
}

