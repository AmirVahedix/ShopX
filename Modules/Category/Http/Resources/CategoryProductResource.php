<?php

namespace Modules\Category\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Product\Http\Resources\ProductEssentialResource;
use Modules\Product\Http\Resources\ProductResource;

class CategoryProductResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'children' => CategoryResource::collection($this->children),
            'products' => ProductEssentialResource::collection($this->products)
        ];
    }
}
