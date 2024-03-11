<?php

namespace Modules\Comment\Http\Resource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            "text" => $this->text,
            "rating" => $this->rating,
            "upvote" => $this->upvote,
            "downvote" => $this->downvote,
        ];
    }
}
