<?php

namespace Modules\Client\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['nullable', 'email'],
            'ssn' => ['required'],
            'birth_date' => ['required'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
