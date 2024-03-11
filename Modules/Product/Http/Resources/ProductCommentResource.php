<?php

namespace Modules\Product\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Attribute\Http\Resources\AttributeResource;
use Modules\Comment\Http\Resource\CommentResource;
use Modules\Variant\Http\Resources\VariantResource;

class ProductCommentResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            "title" => $this->title,
            "slug" => $this->slug,
            "model" => $this->model,
            "price" => $this->price,
            "old_price" => $this->old_price,
            "description" => $this->description,
            "attributes" => AttributeResource::collection($this->attributes),
            "variants" => VariantResource::collection($this->variants),
            "comments" => CommentResource::collection($this->comments()->approved()->get()),
            "brand" => $this->brand
        ];
    }
}
