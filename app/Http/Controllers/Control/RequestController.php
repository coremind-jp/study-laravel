<?php

namespace App\Http\Controllers\control;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    //
    public function index(Request $req, $with_param = 'empty')
    {
        return view('control.request.index', [
            'dump' => [
                'root' => $req->root(),
                'url' => $req->url(),
                'fullUrl' => $req->fullUrl(),
                'path' => $req->path(),
                'ip' => $req->ip(),
                'userAgent' => $req->userAgent(),
            ],
            'with_param' => $with_param,
        ]);
    }
}
