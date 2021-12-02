<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMotoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'marca' => [
                'required',
                'min:3',
                'max:20',
            ],
            'modelo' => [
                'required',
                'min:2',
                'max:30',
            ],
        ];
    }
}
