<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function view_login()
    {
        return view('login');
    }

    public function post_login(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        if (auth()->attempt(array('email' => $data['email'], 'password' => $data['password']))) {
            if (Auth::user()->role == 1) {
                return redirect()->route('homeadmin');
            } else {
                return redirect()->route('homeuser');
            }
        } else {
            return redirect()->route('login')
                ->with('error_login', 'อีเมลหรือรหัสผ่านของคุณไม่ถูกต้อง');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function view_register()
    {
        return view('register');
    }

    public function post_register(Request $request)
    {
        $data = $request->all();
        $request->validate(
            [
                'email' => 'required|email|unique:users',
                'password' => 'required_with:password_confirm|min:6|same:password_confirm',
            ],
            [
                'email.unique' => 'มีอีเมลนี้อยู่แล้ว',
                'password.min' => 'รหัสผ่านต้องมีความยาวอย่างน้อย 6 ตัวอักษร',
                'password.same' => 'รหัสผ่านยืนยันไม่ตรงกับรหัสผ่าน',
            ]
        );

        $usernew = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => 0,
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->back()->with('success-register', 'สมัครสมาชิกสำเร็จ');
    }
}
