<?php

namespace CodeCommerce\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'qtd' => 'required|min:1'
        ];
    }
}