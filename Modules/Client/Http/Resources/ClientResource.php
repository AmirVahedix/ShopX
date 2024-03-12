<?php

namespace Modules\Client\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'name' => $this->name,
            'phone' => $this->phone,
            'phone_verified_at' => $this->phone_verified_at,
            'ssn' => $this->ssn,
            'birth_date' => $this->birth_date,
        ];
    }
}
