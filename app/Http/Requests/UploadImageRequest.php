<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadImageRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'image' => 'image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'image' => '指定のファイルがありません。',
            'mimes' => '指定の拡張子ではありません。',
            'max' => 'ファイルサイズは2MB以内です。'
        ];
    }
}
