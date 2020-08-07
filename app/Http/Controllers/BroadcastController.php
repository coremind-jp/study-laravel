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
        return view('broadcast.public');
    }

    public function postPublic(Request $req)
    {
        Validator::make($req->all(), [
            'message' => [
                'required',
                'string'
            ]
        ])->validated();

        event(new PublicBroadcastEvent($req->message));

        return "";
    }
}
