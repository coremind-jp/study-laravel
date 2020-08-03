<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class StatefulController extends Controller
{
    //
    public function index(Request $req)
    {
        return view('stateful.index', [
            'encrypt' => $req->cookie('encrypt'),
            'plain' => $req->cookie('plain'),
            'session_value' => session('value', null),
        ]);
    }

    public function write_cookie($type = 'encrypt')
    {
        $type == 'encrypt'
            ? Cookie::queue('encrypt', date('Y-m-d H:i:s'), 60 * 24 * 30)
            : Cookie::queue('plain', date('Y-m-d H:i:s'), 60 * 24 * 30);

        return redirect()->route('stateful_index');
    }

    public function clear_cookie($type)
    {
        $type == 'encrypt'
            ? Cookie::queue(Cookie::forget('encrypt'))
            : Cookie::queue(Cookie::forget('plain'));

        return redirect()->route('stateful_index');
    }

    public function write_session()
    {
        session()->put('value', date('Y-m-d H:i:s'));

        return redirect()->route('stateful_index');
    }

    public function clear_session()
    {
        session()->forget('value');
        
        return redirect()->route('stateful_index');
    }

    public function flash(Request $req)
    {
        switch ($req->session) {
            case "flash":
                $req->session()->flash('flash_confirmn', true);
                break;

            case "reflash":
                $req->session()->reflash();
                break;
        }
        
        return view('stateful.confirmn');
    }
}
