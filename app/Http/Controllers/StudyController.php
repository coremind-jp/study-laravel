<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class StudyController extends Controller
{
    //
    public function index()
    {
        return 'こんにちは、世界！';
    }

    public function directive()
    {
        $data = [
            'img' => '<img src="https://avatars1.githubusercontent.com/u/1571522?s=400&v=4" width="200" title="ロゴ"/>',
            'random' => random_int(0, 100),
            'empty' => null,
            'isset' => 'こんにちは、世界！',
            'switch' => random_int(1, 5),
            'foreach' => Book::all(),
            'foreach_key' => [
                'name' => 'M.Jordan',
                'sex' => 'male',
                'birth' => '1963-2-17'
            ],
            'weeks' => ['月', '火', '水', '木', '金', '土', '日'],
        ];

        return view('study.directive', $data);
    }
}
