<?php

namespace Modules\Category\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'image' => count($this->media) ? $this->media[0]->original_url : null,
            'children' => CategoryResource::collection($this->children)
        ];
    }
}
