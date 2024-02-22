<?php

namespace Modules\Attribute\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AttributeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'value' => $this->value
        ];
    }
}
