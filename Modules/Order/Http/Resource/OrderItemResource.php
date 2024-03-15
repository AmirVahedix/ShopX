<?php

namespace Modules\Order\Http\Resource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Product\Http\Resources\ProductResource;
use Modules\Variant\Http\Resources\VariantResource;

class OrderItemResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            "product" => ProductResource::make($this->product),
            "variant" => VariantResource::make($this->variant),
            "qty" => $this->qty,
            "fee" => $this->fee,
        ];
    }
}
