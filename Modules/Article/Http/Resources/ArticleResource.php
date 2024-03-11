<?php

namespace Modules\Article\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            "title" => $this->title,
            "slug" => $this->slug,
            "body" => $this->body,
            "meta_title" => $this->meta_title,
            "meta_description" => $this->meta_description,
            "views" => $this->views,
            "published_at" => $this->published_at,
            "image" => count($this->media) ? $this->media[0]->original_url : null
        ];
    }
}
