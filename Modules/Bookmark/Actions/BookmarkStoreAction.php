<?php

namespace Modules\Bookmark\Actions;

use App\Contracts\ApiAction;
use Modules\Bookmark\Repositories\BookmarkRepo;

class BookmarkStoreAction implements ApiAction
{
    public function execute()
    {
        BookmarkRepo::addProduct(request('product_id'));

        return [
            'message' => 'Bookmark added'
        ];
    }
}
