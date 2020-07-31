<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiddlewareController extends Controller
{
    //
    public function log(Request $req)
    {
        return view('middleware.log', [
            'msg' => $req->msg,
            'tail' => $req->tail
        ]);
    }
}
