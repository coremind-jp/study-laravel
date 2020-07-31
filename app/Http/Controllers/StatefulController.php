<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class StatefulController extends Controller
{
    //
    public function write($type = 'encrypt')
    {
        $type == 'encrypt'
            ? Cookie::queue('encrypt', date('Y-m-d H:i:s'), 60 * 24 * 30)
            : Cookie::queue('plain', date('Y-m-d H:i:s'), 60 * 24 * 30);

        return redirect()->route('cookie');
    }

    public function cookie(Request $req)
    {
        return view('stateful.cookie', [
            'encrypt' => $req->cookie('encrypt'),
            'plain' => $req->cookie('plain'),
        ]);
    }
}
