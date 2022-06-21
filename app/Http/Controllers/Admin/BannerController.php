<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\BannerStoreRequest;
use App\Http\Requests\Admin\BannerUpdateRequest;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::oldest()->get();
        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.store');
    }

    public function store(BannerStoreRequest $request)
    {
        $banner = new Banner();
        if ($request->file('image')) {
            $file = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/uploads/banner/', $file);
            $banner->image = 'storage/uploads/banner/' . $file;
        }
        $banner->isShow = $request->isShow = 1 ?: 0;
        $banner->save();

        $notification = [
            'message' => 'Ugurla elave edildi',
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.banner.index')->with($notification);
    }

    public function   edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(BannerUpdateRequest $request,  Banner $banner)
    {
        if ($request->file('image')) {
            File::delete($banner->image);
            $file = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/uploads/banner/', $file);
            $banner->image = 'storage/uploads/banner/' . $file;
        }
        $banner->isShow = $request-> isShow  ? 1 : 0;
        $banner->save();

        $notification = [
            'message' => 'Ugurla Yenilendi edildi',
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.banner.index')->with($notification);
    }

    public function destroy(Banner $banner)
    {
        $banner->isShow = 0;
        $banner->save();

        $notification = [
            'message' => 'Ugurla silindi',
            'alert-type' => 'success'
        ];
        return redirect()->route('admin.banner.index')->with($notification);
    }

    public function active(Banner $banner)
    {
        $banner->isShow = 1;
        $banner->save();

        $notification = [
            'message'=>'Aktiv olundu',
            'alert-type'=>'success'
        ];
        return redirect()->route('admin.banner.index')->with($notification);
    }

    
}
