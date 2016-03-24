<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FileRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fileUpload' => 'mimes:doc,docx.pdf,jpeg,jpg,png,gif|max:10000'
        ];
    }
}
