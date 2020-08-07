<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function home(Request $req)
    {
        return view('auth_scratch.home', [
            'name' => Auth::user()->name,
            'id' => Auth::user()->id,
        ]);
    }

    public function updateTokne(Request $req)
    {
        $token = Str::random(60);

        $req->user()->forceFill([
            // 'api_token' => hash('sha256', $token),
            // ハッシュ化したいが現状API認証のドキュメントに到達していないので
            // とりあえず生のトークンを渡す
            'api_token' => $token,
        ])->save();

        return view('auth_scratch.token', [
            'token' => $token
        ]);
    }

    public function profile(Request $req)
    {
        return view('auth_scratch.profile', [
            'role' => Auth::user()->role,
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
        ]);
    }

    public function pay(Request $req)
    {
        return view('auth_scratch.pay', [
        ]);
    }
}
