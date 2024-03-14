<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyRequest extends FormRequest
{
    public function rules()
    {
        return [
            "phone" => ['required'],
            'otp' => ['required'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
