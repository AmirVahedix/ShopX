<?php

namespace Modules\Product\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductEssentialResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "slug" => $this->slug,
            "price" => $this->price,
            "old_price" => $this->old_price,
            "thumbnail" => count($this->getMedia('gallery'))
                ? $this->getMedia('gallery')[0]->original_url
                : null
        ];
    }
}
