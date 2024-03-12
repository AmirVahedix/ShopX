<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function rules()
    {
        return [
            'phone' => ['required', 'starts_with:09', 'digits:11', 'numeric']
        ];
    }

    public function authorize()
    {
        return true;
    }
}
