<?php

namespace Modules\Order\Http\Resource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Address\Http\Resource\AddressResource;

class OrderResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'sku' => $this->sku,
            'address' => AddressResource::make($this->address),
            'items' => OrderItemResource::collection($this->items),
            'status' => $this->status,
            'id_paid' => !!$this->paid_at,
            'created_at' => $this->created_at
        ];
    }
}
