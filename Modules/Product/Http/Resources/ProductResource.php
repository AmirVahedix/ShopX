<?php

namespace Modules\Product\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Attribute\Http\Resources\AttributeResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "title" => $this->title,
            "slug" => $this->slug,
            "model" => $this->model,
            "description" => $this->description,
            "attributes" => AttributeResource::collection($this->attributes)
        ];
    }
}
