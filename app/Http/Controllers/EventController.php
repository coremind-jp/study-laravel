<?php

namespace App\Http\Controllers;

use App\Events\ScopedEvent;
use App\Events\GlobalEvent;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function global(Request $req)
    {
        event(new GlobalEvent('I\'m global event.'));

        return view('event.global', [
            'recieved' => $req->recieved,
        ]);
    }

    public function scoped(Request $req)
    {
        event(new ScopedEvent('I\'m scoped event.'));

        return view('event.scoped', [
            'recieved' => $req->recieved,
        ]);
    }
}
