<?php

namespace Modules\Client\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Address\Http\Resource\AddressResource;

class ClientResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'name' => $this->name,
            'phone' => $this->phone,
            'is_phone_verified' => !!$this->phone_verified_at,
            'email' => $this->email,
            'is_email_verified' => !!$this->email_verified_at,
            'ssn' => $this->ssn,
            'birth_date' => $this->birth_date,
            'joined_at' => jdate($this->created_at)->ago(),
            'addresses' => AddressResource::collection($this->addresses)
        ];
    }
}
