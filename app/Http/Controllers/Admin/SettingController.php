<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\SettingStoreRequest;
use App\Http\Requests\Admin\SettingUpdateRequest;

class SettingController extends Controller
{


    public function edit(Setting $setting)
    {
        return view('admin.setting.edit', compact('setting'));
    }

    public function update(SettingUpdateRequest $request, Setting $setting)
    {
        if ($request->file('logo')) {
            File::delete($setting->logo);
            $file = time() . '.' . $request->logo->extension();
            $request->logo->StoreAs('public/uploads/setting/', $file);
            $setting->logo = 'storage/uploads/setting/' . $file;
        }
        $setting->about = $request->about;
        $setting->footer = $request->footer;
        $setting->save();
        
        $notification=[
            "message"=>"Ugurla Redakte olundu",
            "alert-type"=>"success"
        ];
        return redirect()->route('admin.setting.edit',$setting)->with($notification);
    }
   
}
