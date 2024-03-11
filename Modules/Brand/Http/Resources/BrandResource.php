<?php

namespace Modules\Brand\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            "title" => $this->title,
            "description" => $this->description,
            "image" => count($this->media) ? $this->media[0]->original_url : null
        ];
    }
}
