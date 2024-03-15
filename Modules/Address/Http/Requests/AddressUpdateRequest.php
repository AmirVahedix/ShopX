<?php

namespace Modules\Address\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'zone_id' => ['required', 'exists:zones,id'],
            'estate_id' => ['required', 'exists:estates,id'],
            'address' => ['required'],
            'postal_code' => ['required', 'numeric'],
            'receiver_name' => ['nullable'],
            'receiver_phone' => ['nullable'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
