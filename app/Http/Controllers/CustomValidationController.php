<?php

namespace App\Http\Controllers;

use App\Rules\CustomValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomValidationController extends Controller
{
    public function index()
    {
        return view('custom_validation.index');
    }

    //
    public function rule(Request $req)
    {
        $req->validate([
            'form_rule' => [
                'required',
                'string',
                new CustomValidator
            ],
        ]);

        return redirect()->action('CustomValidationController@index');
    }

    public function extend(Request $req)
    {
        $req->validate([
            'form_extend' => [
                'required',
                'string',
                'as_extend'
            ],
        ]);

        return redirect()->action('CustomValidationController@index');
    }

    public function closure(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'form_closure' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if ($value !== 'closure') {
                        $fail(trans('validation.custom.as_closure'));
                    }
                }
            ]
        ])->validate();

        return redirect()->action('CustomValidationController@index');
    }
}
