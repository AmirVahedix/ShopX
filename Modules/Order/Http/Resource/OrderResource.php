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
            'shipping_method' => $this->shipping_method,
            'shipping_price' => $this->shipping_price,
            'pure_price' => $this->pure_price,
            'total_price' => $this->total_price,
            'status' => $this->status,
            'id_paid' => !!$this->paid_at,
            'created_at' => jdate($this->created_at)->format('m F Y')
        ];
    }
}
