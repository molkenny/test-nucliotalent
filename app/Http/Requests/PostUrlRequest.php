<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class PostUrlRequest extends FormRequest
{

    public function rules()
    {
        return [
            'url' => 'required|url'
        ];
    }

    public function messages(){
        return [
            'url.required' => 'The url parameter is required',
            'url.url' => 'The url parameter does not have a valid format',
        ];

    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}
