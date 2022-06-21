<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ImportantLinkStoreRequest;
use App\Http\Requests\Admin\ImportantLinkUpdateRequest;
use App\Models\ImportantLink;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Loader\Configurator\ImportConfigurator;

class ImportantLinkController extends Controller
{
    public function index()
    {
        $important_links = ImportantLink::oldest()->get();
        return view('admin.important_link.index', compact('important_links'));
    }

    public function create()
    {
        return view('admin.important_link.store');
    }

    public function store(ImportantLinkStoreRequest $request)
    {
        $important_link = new ImportantLink();
        $important_link->name = $request->name;
        $important_link->url = $request->url;
        $important_link->save();

        $notification = [
            "message" => 'Ugurla elave edildi',
            "alert-type" => "success"
        ];

        return redirect()->route('admin.important_link.index')->with($notification);
    }


    public function edit(ImportantLink $important_link)
    {
        return view('admin.important_link.edit', compact('important_link'));
    }

    public function update(ImportantLinkUpdateRequest $request, ImportantLink $important_link)
    {
        $important_link->name = $request->name;
        $important_link->url = $request->url;
        $important_link->save();

        $notification = [
            "message" => 'Ugurla elave edildi',
            "alert-type" => "success"
        ];

        return redirect()->route('admin.important_link.index')->with($notification);
    }

    public function destroy(ImportantLink $important_link)
    {
        $important_link->delete();
        $notification = [
            "message" => 'Ugurla  silindi',
            "alert-type" => "success"
        ];
        return redirect()->route('admin.important_link.index')->with($notification);
    }
}
