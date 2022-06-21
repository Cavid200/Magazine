<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SocialMediaStoreRequest;
use App\Http\Requests\Admin\SocialMediaUpdateRequest;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function index()
    {
        $social_medias = SocialMedia::oldest()->get();
        return  view('admin.social_media.index', compact('social_medias'));
    }

    public function create()
    {
        return view('admin.social_media.store');
    }

    public function store(SocialMediaStoreRequest $request)
    {
        $social_media = new SocialMedia();
        $social_media->name = $request->name;
        $social_media->url = $request->url;
        $social_media->icon = $request->icon;
        $social_media->save();

        $notification = [
            "message" => "Ugurla elave edildi",
            "alert-type" => "success"
        ];
        return redirect()->route('admin.social_media.index')->with($notification);
    }

    public function edit(SocialMedia $social_media)
    {
        return view('admin.social_media.edit', compact('social_media'));
    }

    public function update(SocialMediaUpdateRequest $request, SocialMedia $social_media)
    {
        $social_media->name = $request->name;
        $social_media->url = $request->url;
        $social_media->icon = $request->icon;
        $social_media->save();

        $notification = [
            "message" => "Ugurla Redakte olundu",
            "alert-type" => "success"
        ];
        return redirect()->route('admin.social_media.index')->with($notification);
    }

    public function destroy(SocialMedia $social_media)
    {
        $social_media->delete();

        $notification = [
            "message" => "Ugurla Silindi",
            "alert-type" => "success"
        ];
        return redirect()->route('admin.social_media.index')->with($notification);
    }
}
