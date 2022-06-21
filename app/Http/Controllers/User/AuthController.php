<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\User\LoginRequest as UserLoginRequest;
use App\Http\Requests\User\RegisterRequest as UserRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register()
    {
        return view('user.auth.register');
    }


    public function login()
    {
        return view('user.auth.login');
    }

    public function post_register(UserRegisterRequest $request)
    {
        if (User::where('email', $request->email)->doesntExist()) {
            $user = new User();
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role_id=1;
            $user->save();

            $notification=[
                'message'=>'Qeydiyyat ugurla tamamlandi',
                'alert-type'=>'success'
            ];

            return redirect()->route('user.login')->with($notification);
        } else {
            return redirect()->route('user.register')->with('error','Bu email istifade olunub');
        }
    }

    

    public function post_login(UserLoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $notification=[
                'message'=>'Xos geldiniz'.  auth()->user()->firstname,
                'alert-type'=>'success'
            ];

            return redirect()->route('user.index')->with($notification);
        }
            else
            {
                $notification=[
                    'message'=>'Email ve ya Password sehvdir',
                    'alert-type'=>'error'
                ];
                return redirect()->route('user.login')->with($notification);
             }
    }
    public function sign_out(){
        Auth::logout();
        return redirect()->route('user.login');
    }
}
