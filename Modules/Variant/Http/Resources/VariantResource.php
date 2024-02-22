<?php

namespace Modules\Variant\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VariantResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "color_name" => $this->color_name,
            "color_hash" => $this->color_hash,
            "warranty" => $this->warranty,
            "price" => number_format($this->price),
            "old_price" => $this->old_price ? number_format($this->old_price) : null,
            "stock" => $this->stock,
        ];
    }
}
