<?php

namespace Modules\Bookmark\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Product\Http\Resources\ProductResource;

class BookmarkResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'product_id' => $this->product_id,
            'product' => ProductResource::make($this->product)
        ];
    }
}
