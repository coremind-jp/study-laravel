<?php

namespace App\Http\Controllers\control;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    //
    public function plain()
    {
        return response('こんにちは、世界！', 200)
            ->header('Content-Type', 'text/plain');
    }

    public function json()
    {
        return response()
            ->json([
                'str' => '0',
                'num' => 100,
                'nil' => null,
                'obj' => [
                    'prop' => 'object property',
                ],
                'arr' => [
                    'this',
                    ' is ',
                    'array',
                ]
            ]);
    }

    public function download()
    {
        return response()
            ->streamDownload(
                function () {
                    print('hello, world!');
                },
                'MessageForYou.txt',
                ['content-type'=>'plain/text']
            );
    }

    public function file()
    {
        return response()
            ->file(
                '/usr/share/nginx/html/sample.jpg',
                ['content-type' => 'image/jpeg']
            );
    }

    public function request_redirect($type)
    {
        switch ($type) {
            case 'route':
                return redirect()->route('redirect');

            case 'route_with_param':
                return redirect()->route('redirect', ['param' => 'hello, world!']);

            case 'away':
                return redirect()->away('https://github.com/coremind-jp');

            default:
                return redirect('/study');
        }
    }

    public function redirect(Request $req)
    {
        return isset($req->param)
            ? 'リダイレクトしました。受け取ったパラメータ: ' . $req->param
            : 'リダイレクトしました。パラメータは付与されていません';
    }
}
