<?php

namespace Modules\Product\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Attribute\Http\Resources\AttributeResource;
use Modules\Variant\Http\Resources\VariantResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "slug" => $this->slug,
            "model" => $this->model,
            "price" => $this->price,
            "old_price" => $this->old_price,
            "description" => $this->description,
            "attributes" => AttributeResource::collection($this->attributes),
            "variants" => VariantResource::collection($this->variants)
        ];
    }
}
