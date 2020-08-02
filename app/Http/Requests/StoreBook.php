<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBook extends FormRequest
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
            'isbn' => ['required', 'regex:/^978-4-[0-9]{2,7}-[0-9]{1,6}-[0-9]$/'],
            'title' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'publisher' => ['required', 'string'],
            'published' => ['required', 'date'],
        ];
    }

    public function messages()
    {
        return [
            'isbn.required' => 'ISBNコードを入力してください',
            'isbn.regex' => 'ISBNコードとして認識できませんでした',
            'title.required' => '書名を入力してください',
            'title.string' => '文字列として認識できませんでした',
            'price.required' => '価格を入力してください',
            'price.integer' => '数値として認識できませんでした',
            'publisher.required' => '出版社を入力してください',
            'publisher.string' => '文字列として認識できませんでした',
            'published.required' => '刊行日を入力してください',
            'published.date' => '日付として認識できませんでした',
        ];
    }
}
