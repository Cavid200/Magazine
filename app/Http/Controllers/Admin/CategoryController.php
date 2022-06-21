<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::oldest()->get();
        return view('admin.category.index', compact('categories'));
    }


    public function create()
    {
        return view('admin.category.store');
    }

    public function store(CategoryStoreRequest $request)
    {
        $category = new Category();
        if ($request->file('image')) {
            $file = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/uploads/category/', $file);
            $category->image = 'storage/uploads/category/' . $file;
        }
        $category->setTranslation('name', app()->getLocale(), $request->name);
        $category->isActive = $request->isActive ? 1 : 0;
        $category->save();

        $notification = [
            "message" => "Ugurla elave edildi",
            "alert-type" => "success"
        ];

        return redirect()->route('admin.category.index')->with($notification);
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    public function update(CategoryUpdateRequest $request,Category $category)
    {
        $category->setTranslation('name', app()->getLocale(), $request->name);
        if ($request->file('image')) {
            File::delete($category->image);
            $file = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/uploads/category/', $file);
            $category->image = 'storage/uploads/category/' . $file;
        }
        $category->isActive = $request->isActive ? 1 : 0;
        $category->save();

        $notification = [
            "message" => "Ugurla Redakte olundu",
            "alert-type" => "success"
        ];

        return redirect()->route('admin.category.index')->with($notification);
    }

    public function destroy(Category $category){
        $category->isActive = 0; 
        $category->save();

        $notification = [
            "message" => "Ugurla Silindi",
            "alert-type" => "success"
        ];

        return redirect()->route('admin.category.index')->with($notification);
    }
    
    public function active(Category $category){
        $category->isActive = 1; 
        $category->save();

        $notification = [
            "message" => "Aktiv olundu",
            "alert-type" => "success"
        ];

        return redirect()->route('admin.category.index')->with($notification);
    }
}
