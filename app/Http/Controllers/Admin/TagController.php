<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagStoreRequest;
use App\Http\Requests\Admin\TagUpdateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::oldest()->get();
        return view('admin.tag.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tag.store');
    }

    public function store(TagStoreRequest $request)
    {
        $tag = new Tag();
        $tag->setTranslation('name', app()->getLocale(), $request->name);
        $tag->save();

        $notification = [
            "message" => "Ugurla elave olundu",
            "alert-type" => "success"
        ];
        return redirect()->route('admin.tag.index')->with($notification);
    }

    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }

    public function update(TagUpdateRequest $request, Tag $tag)
    {
        $tag->setTranslation('name', app()->getLocale(), $request->name);
        $tag->save();

        $notification = [
            "message" => "Ugurla Redakte olundu",
            "alert-type" => "success"
        ];
        return redirect()->route('admin.tag.index')->with($notification);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        
        $notification=[
            "message"=>"Ugurla silindi",
            "alert-type"=>"success"
        ];
        return redirect()->route('admin.tag.index')->with($notification);
    }
}
