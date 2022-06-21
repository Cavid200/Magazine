<?php

namespace App\Http\Controllers\Admin;

use App\Models\MainImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\MainImageStoreRequest;
use App\Http\Requests\Admin\MainImageUpdateRequest;

class MainImageController extends Controller
{
    public function edit(MainImage $main_image)
    {
        return view('admin.main_image.edit', compact('main_image'));
    }

    public function update(MainImageUpdateRequest $request, MainImage $main_image)
    {
        if($request->file('image')){
            File::delete($main_image->image);
            $file = time() . '.' . $request->image->extension();
            $request->image->StoreAs('public/uploads/main_image/', $file);
            $main_image->image = 'storage/uploads/main_image/' . $file;
        }
        $main_image->title = $request->title;
        $main_image->save();

        $notification = [
            "message" => "Ugurla Redakte olundu",
            "alert-type" => "success"
        ];
        return redirect()->route('admin.main_image.edit',$main_image)->with($notification);
    }
}
