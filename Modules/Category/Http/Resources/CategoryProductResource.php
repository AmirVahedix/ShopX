<?php

namespace Modules\Category\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Product\Http\Resources\ProductResource;

class CategoryProductResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'products' => ProductResource::collection($this->products)
        ];
    }
}
