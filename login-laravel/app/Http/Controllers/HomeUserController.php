<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeUserController extends Controller
{
    public function homeuser()
    {
        return view('User.homeuser');
    }
}
