<?php

namespace Modules\Address\Http\Resource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'zone' => $this->zone->name,
            'estate' => $this->estate->name,
            'address' => $this->address,
            'postal_code' => $this->postal_code,
            'receiver_name' => $this->receiver_name,
            'receiver_phone' => $this->receiver_phone,
            'is_default' => $this->is_default
        ];
    }
}
