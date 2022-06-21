<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('admin.auth.login');
    }

    public function post_login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $notification=[
                'message'=>'Xos geldiniz'. auth()->user()->firstname,
                'alert-type'=>'success'
            ];

            return redirect()->route('admin.index')->with($notification);
        }
        else
        {
            $notification=[
                'message'=>'Email ve ya Password sevhdir',
                'alert-type'=>'error'
            ];
            return redirect()->route('admin.login')->with($notification);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
