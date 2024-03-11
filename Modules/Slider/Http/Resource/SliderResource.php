<?php

namespace Modules\Slider\Http\Resource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'title' => $this->title,
            'href' => $this->href,
            'image' => count($this->media) ? $this->media[0]->original_url : null
        ];
    }
}
