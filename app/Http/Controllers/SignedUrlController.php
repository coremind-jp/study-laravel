<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SignedUrlController extends Controller
{
    //
    public function index()
    {
        $timeleft = 1;

        return view('signed_url.index', [
            'timeleft' => $timeleft,
            'signed' => URL::signedRoute('verify'),
            'temporary' => URL::temporarySignedRoute(
                'verify',
                now()->addMinute($timeleft)
            ),
        ]);
    }

    public function verify(Request $req)
    {
        if (!$req->hasValidSignature()) {
            abort(401);
        }

        return view('signed_url.verify');
    }
}
