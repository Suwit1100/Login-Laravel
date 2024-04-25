<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function view_login()
    {
        return view('login');
    }

    public function post_login(Request $request)
    {
        $data = $request->all();
        if (auth()->attempt(array('email' => $data['email'], 'password' => $data['password']))) {
            if (Auth::user()->role == 1) {
                return redirect()->route('home_admin');
            } else {
                return redirect()->route('home_user');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'อีเมลหรือรหัสผ่านของคุณไม่ถูกต้อง');
        }
    }
}
