<?php

namespace Modules\Bookmark\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Bookmark\Models\Bookmark;

class BookmarkRepo
{
    public static function findByClient(string $id): Collection
    {
        return Bookmark::with('product')
            ->where('client_id', $id)
            ->get();
    }
}
