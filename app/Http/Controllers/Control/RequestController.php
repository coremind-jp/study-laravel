<?php

namespace App\Http\Controllers\control;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    //
    public function index(Request $req)
    {
        if (!$req->hasFile('upload') || !$req->file('upload')->isValid())
            $file = null;
        else
            $file = [
                'getClientOriginalName' => $req->file('upload')->getClientOriginalName(),
                'getClientOriginalExtension' => $req->file('upload')->getClientOriginalExtension(),
                'getClientMimeType' => $req->file('upload')->getClientMimeType(),
                'getSize' => $req->file('upload')->getSize(),
            ];

        $checkbox = $req->has('checkbox')
            ? implode(',', $req->checkbox):
            null;

        return view('control.request.index', [
            'dump' => [
                'root' => $req->root(),
                'url' => $req->url(),
                'fullUrl' => $req->fullUrl(),
                'path' => $req->path(),
                'ip' => $req->ip(),
                'userAgent' => $req->userAgent(),
            ],
            'name' => $req->input('name', null),
            'checkbox' => $checkbox,
            'select' => $req->input('select', 0),
            'radio' => $req->input('radio', 0),
            'file' => $file,
        ]);
    }
}
