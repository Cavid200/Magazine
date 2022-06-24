<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\PostStoreRequest;
use App\Http\Requests\Admin\PostUpdateRequest;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $tags=Tag::oldest('name')->get();
        $categories=Category::where('isActive',1)->oldest('name')->get();
        return view('admin.post.store',compact('tags','categories'));
    }


    public function store(PostStoreRequest $request)
    {
        $tags=Tag::whereIn('id',$request->tags)->get();
        $categories=Category::whereIn('id',$request->categories)->get();

        $post = new Post();
        $post->title = $request->title;
        $post->short_description = $request->short_description;
        $post->description = $request->description;
        $post->publish_time = $request->publish_time;
        $post->views = 0;
        $post->isActive = $request->isActive ? 1 : 0;
        $post->isEditor = $request->isEditor ? 1 : 0;
        $post->user_id = auth()->user()->id;
        if ($request->file('image')) {
            $file = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/uploads/post/', $file);
            $post->image = 'storage/uploads/post/' . $file;
        }
        $post->save();

        $post->tags()->attach($tags);
        $post->categories()->attach($categories);

        $notification = [
            "message" => "Ugurla elave edildi",
            "alert-type" => "success"
        ];
        return redirect()->route('admin.post.index')->with($notification);
    }

    public function edit(Post $post)
    {
        $tags=Tag::oldest('name')->get();
        $users = User::where('isActive', 1)->get();
        $categories=Category::where('isActive',1)->oldest('name')->get();
        return view('admin.post.edit', compact('users','post','tags','categories'));
    }


    public function update(PostUpdateRequest $request, Post $post)
    {
        $tags=Tag::whereIn('id',$request->tags)->get();
        $categories=Category::whereIn('id',$request->categories)->get();

        $post->title = $request->title;
        $post->short_description = $request->short_description;
        $post->description = $request->description;
        $post->publish_time = $request->publish_time;
        $post->views = 0;
        $post->isActive = $request->isActive ? 1 : 0;
        $post->isEditor = $request->isEditor ? 1 : 0;
        $post->user_id = auth()->user()->id;
        if ($request->file('image')) {
            File::delete($post->image);
            $file = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/uploads/post/', $file);
            $post->image = 'storage/uploads/post/' . $file;
        }
        $post->save();
        $post->tags()->sync($tags);
        $post->categories()->sync($categories);

        $notification = [
            "message" => "Ugurla redakte edildi edildi",
            "alert-type" => "success"
        ];
        return redirect()->route('admin.post.index')->with($notification);
    }

    public function destroy(Post $post){
        $post->isActive=0;
        $post->save();

        $notification = [
            "message" => "Ugurla Silindi ",
            "alert-type" => "success"
        ];
        return redirect()->route('admin.post.index')->with($notification);

    }
    public function active(Post $post){
        $post->isActive=1;
        $post->save();

        $notification = [
            "message" => "Ugurla aktiv  olundu",
            "alert-type" => "success"
        ];
        return redirect()->route('admin.post.index')->with($notification);

    }
}
