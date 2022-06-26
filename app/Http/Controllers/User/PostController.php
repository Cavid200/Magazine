<?php

namespace App\Http\Controllers\User;

use App\Models\Like;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function show($slug){

        $post=Post::with('comments')->where('slug','Like','%'.$slug.'%')->firstOrFail();
        $post->increment('views');
        $post->save();
        $popular_posts=Post::orderByDesc('views')->take(4)->get();
        $like_count=Like::where('post_id',$post->id)->count();
        if(auth()->user())
        {
            $like_exists = Like::where('user_id',auth()->user()->id)->where('post_id',$post->id)->count();
        }
        else
        {
            $like_exists=null;
        }

        return view('user.post.show',compact('post','popular_posts','like_count','like_exists')); 
    }

    public function search (Request $request){

        $posts = Post::with('categories')->where('title', 'LIKE', "%{$request->search}%")->get();
        return view('user.post.search',compact('posts'));
        
    }
    
}
