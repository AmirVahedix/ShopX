<?php

namespace Modules\Banner\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            "title" => $this->title,
            "link" => $this->link,
            "type" => $this->type,
            "image" => count($this->media) ? $this->media[0]->original_url : null
        ];
    }
}
