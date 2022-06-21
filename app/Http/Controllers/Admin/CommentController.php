<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        $comments=Comment::latest()->get();
        return view('admin.comment.index',compact('comments'));

    }

    public function show(Comment $comment){

        return view('admin.comment.show',compact('comment'));
    }

    public function destroy(Comment $comment){
        $comment->isActive=0;
        $comment->save();

        $notification=[
            "message" => "Ugurla Silindi ",
            "alert-type" => "success"
        ];

        return redirect()->route('admin.comment.index')->with($notification);
    }

    public function active(Comment $comment){
        $comment->isActive=1;
        $comment->save();

        $notification=[
            "message" => "Ugurla aktiv  olundu",
            "alert-type" => "success"
        ];

        return redirect()->route('admin.comment.index')->with($notification);
    }

}
