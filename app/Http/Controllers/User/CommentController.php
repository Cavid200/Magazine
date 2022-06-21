<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CommentRequest;

class CommentController extends Controller
{
    public function store(CommentRequest $request,Post $post){
       
        $comment=new Comment();
        $comment->fullname=$request->fullname;
        $comment->content=$request->content;
        $comment->post_id=$post->id;
        $comment->user_id=auth()->user()->id ?? null;
        
        $comment->save();

        $nontification=[
            'message'=>'Mesajiniz ugurla gonderildi',
            'alert-type'=>'success'

        ];

        // return response()->json(['success'=>$nontification]);
        return view('user.post.coment',compact('comment'));

    }
}
