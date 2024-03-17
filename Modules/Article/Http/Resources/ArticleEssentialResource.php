<?php

namespace Modules\Article\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleEssentialResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            "title" => $this->title,
            "slug" => $this->slug,
            "image" => count($this->media) ? $this->media[0]->original_url : null,
            "reading_time" => $this->reading_time,
        ];
    }
}
