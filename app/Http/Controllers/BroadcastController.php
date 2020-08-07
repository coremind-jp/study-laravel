<?php

namespace App\Http\Controllers;

use App\Events\PrivateBroadcastEvent;
use App\Events\PublicBroadcastEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class BroadcastController extends Controller
{
    //
    public function public()
    {
        return view('broadcast.index', [
            'id' => Auth::user()->id,
            'token' => Auth::user()->api_token,
            'access' => 'public',
            'name'  => 'パブリック'
        ]);
    }

    public function private()
    {
        return view('broadcast.index', [
            'id' => Auth::user()->id,
            'token' => Auth::user()->api_token,
            'access' => 'private',
            'name'  => 'プライベート'
        ]);
    }

    public function postPublic(Request $req)
    {
        Validator::make($req->all(), [
            'message' => [
                'required',
                'string'
            ]
        ])->validated();

        broadcast(new PublicBroadcastEvent($req->message));

        return "";
    }

    public function postPrivate(Request $req)
    {
        Validator::make($req->all(), [
            'message' => [
                'required',
                'string'
            ]
        ])->validated();

        broadcast(new PrivateBroadcastEvent(Auth::user(), $req->message));

        return "";
    }
}
