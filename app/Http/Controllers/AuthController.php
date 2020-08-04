<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function home(Request $req)
    {
        return view('auth_scratch.home', [
            'name' => Auth::user()->name
        ]);
    }

    public function profile(Request $req)
    {
        return view('auth_scratch.profile', [
            'name' => Auth::user()->name,
            'email' => Auth::user()->email
        ]);
    }

    public function pay(Request $req)
    {
        return view('auth_scratch.pay', [
        ]);
    }
}
