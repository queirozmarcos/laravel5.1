<?php

namespace CodeCommerce\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'is_admin' => 'required|between:0,1'
        ];
    }
}