<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->latest()->get();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::where('isActive', 1)->get();
        return view('admin.user.store', compact('roles'));
    }
    public function store(UserStoreRequest $request)
    {
        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        if ($request->file('image')) {
            $file = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/uploads/user/', $file);
            $user->image = 'storage/uploads/user/' . $file;
        }
        $user->about = $request->about;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;
        $user->isActive = $request->isActive ? 1 : 0;
        $user->save();

        $notification = [
            'message' => 'Ugurla elave edildi',
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.user.index')->with($notification);
    }

    public function edit(User $user)
    {
        $roles = Role::where('isActive', 1)->get();
        return view('admin.user.edit', compact('roles', 'user'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;

        if ($request->file('image')) {
            File::delete($user->image);
            $file = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/uploads/user/', $file);
            $user->image = 'storage/uploads/user/' . $file;
        }
        $user->about = $request->about;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->role_id = $request->role_id;
        $user->isActive = $request->isActive ? 1 : 0;
        $user->save();

        $notification = [
            'message' => 'Ugurla redakte edildi',
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.user.index')->with($notification);
    }
    public function destroy(User $user)
    {
        $user->isActive = 0;
        $user->save();
        $notification = [
            'message' => 'Ugurla silindi',
            'alert-type' => 'error'
        ];
        return redirect()->route('admin.user.index')->with($notification);
    }

    public function active(User $user)
    {
        $user->isActive = 1 ;
        $user->save();
        $notification = [
            'message' => 'Aktiv olundu',
            'alert-type' => 'success'
        ];
        return redirect()->route('admin.user.index')->with($notification);
    }
}
