<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestExample extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:20'],
            'checkbox' => ['required'],
            'radio' => ['required'],
            'select' => ['required'],
            'upload' => ['required', 'file'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前を入力してください',
            'name.max' => '入力できる文字数は20文字までです',
            'checkbox.required' => '最低でも１つ選択してください',
            'radio.required' => 'いずれか１つを選択してください',
            'select.required' => 'いずれか１つを選択してください',
            'upload.required' => 'アップロードファイルが選択されていません',
            'upload.file' => 'アップロードに失敗しました',
        ];
    }
}
