<?php

namespace CodeCommerce\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'status' => 'required|between:0,1'
        ];
    }
}