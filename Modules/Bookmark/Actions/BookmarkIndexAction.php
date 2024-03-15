<?php

namespace Modules\Bookmark\Actions;

use App\Contracts\ApiAction;
use Modules\Bookmark\Http\Resources\BookmarkResource;
use Modules\Bookmark\Repositories\BookmarkRepo;

class BookmarkIndexAction implements ApiAction
{
    public function execute()
    {
        $bookmarks = BookmarkRepo::findByClient(auth()->id());

        return BookmarkResource::collection($bookmarks);
    }
}
