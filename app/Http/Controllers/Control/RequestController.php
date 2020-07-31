<?php

namespace App\Http\Controllers\control;

use Illuminate\Http\Request;
use App\Http\Requests\FormRequestExample;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    //
    public function create(Request $req)
    {
        return view('control.request.index', [
            'dump' => $this->_dump_request($req),
            'validated' => false
        ]);
    }

    public function post(FormRequestExample $req)
    {
        $post = $req->validated();

        return view('control.request.index', [
            'dump' => $this->_dump_request($req),
            'validated' => true,
            'name' => $post['name'],
            'checkbox' => implode(',', $post['checkbox']),
            'radio' => $post['radio'],
            'select' => $post['select'],
            'upload' => [
                'getClientOriginalName' => $post['upload']->getClientOriginalName(),
                'getClientOriginalExtension' => $post['upload']->getClientOriginalExtension(),
                'getClientMimeType' => $post['upload']->getClientMimeType(),
                'getSize' => $post['upload']->getSize(),
            ],
        ]);
    }

    private function _dump_request($req)
    {
        return [
            'root' => $req->root(),
            'url' => $req->url(),
            'fullUrl' => $req->fullUrl(),
            'path' => $req->path(),
            'ip' => $req->ip(),
            'userAgent' => $req->userAgent(),
        ];
    }    
}
