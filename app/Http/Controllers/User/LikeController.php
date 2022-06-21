<?php

namespace App\Http\Controllers\User;

use App\Models\Like;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LikeController extends Controller
{
    public function like(Post $post)
    {
        if (auth()->user()) {
            if (Like::where('user_id',auth()->user()->id)->where('post_id',$post->id)->doesntExist()) {
                $like = new Like();
                $like->post_id = $post->id;
                $like->user_id = auth()->user()->id;
                $like->save();
                return response()->json(['success_like', 'Ugurla like edildi']);
            }
            else{
                $like=Like::where('user_id',auth()->user()->id)->where('post_id',$post->id)->first();
                $like->delete();
                return response()->json(['success_unlike', 'Ugurla unlike edildi']);
            }
        } else {
            return response()->json(['error', 'LOGIN OL']);
        }
    }
}
