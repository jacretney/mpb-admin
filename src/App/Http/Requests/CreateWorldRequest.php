<?php

namespace Substratum\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateWorldRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:50',
            ],
            'create_option' => [
                'required',
                'string',
            ],
            'file' => [
                'required_if:create_option,existing',
                'mimes:zip',
            ]
        ];
    }
}