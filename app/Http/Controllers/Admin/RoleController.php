<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleStoreRequest;
use App\Http\Requests\Admin\RoleUpdateRequest;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::oldest()->get();
        return view('admin.role.index', compact('roles'));
    }


    public function create()
    {
        return view('admin.role.store');
    }

    public function store(RoleStoreRequest $request)
    {
        $role = new Role();
        $role->setTranslation('name', app()->getLocale(), $request->name);
        $role->isActive = $request->isActive ? 1 : 0;
        $role->save();

        $notification = [
            'message' => 'Ugurla elave edildi',
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.role.index')->with($notification);
    }

    public function edit(Role $role)
    {
        return view('admin.role.edit', compact('role'));
    }
    public function update(RoleUpdateRequest $request, Role $role)
    {
        $role->setTranslation('name', app()->getLocale(), $request->name);
        $role->isActive = $request->isActive ? 1 : 0;
        $role->save();

        $notification = [
            'message' => 'Ugurla Redakte olundu',
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.role.index');
    }

    public function destroy(Role $role)
    {
        $role->isActive = 0;
        $role->save();
        $notification = [
            'message' => 'Ugurla silindi',
            'alert-type' => 'success'
        ];
        return redirect()->route('admin.role.index')->with($notification);
    }
    public function active(Role $role)
    {
        $role->isActive = 1;
        $role->save();
        $notification = [
            'message' => 'Aktiv olundu',
            'alert-type' => 'success'
        ];
        return redirect()->route('admin.role.index')->with($notification);
    }
}
