<?php

namespace Modules\Bookmark\Actions;

use App\Contracts\ApiAction;
use Modules\Bookmark\Repositories\BookmarkRepo;

class BookmarkDeleteAction implements ApiAction
{
    public function execute()
    {
        $bookmark = BookmarkRepo::find(request('product_id'));

        $bookmark->delete();

        return [
            'message' => 'Bookmark deleted successfully'
        ];
    }
}
