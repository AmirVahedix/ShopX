<?php

namespace Modules\Bookmark\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Bookmark\Actions\BookmarkIndexAction;
use Modules\Bookmark\Actions\BookmarkStoreAction;

class BookmarkController extends Controller
{
    public function index(BookmarkIndexAction $action)
    {
        return $this->executeApiAction($action);
    }

    public function store($product_id, BookmarkStoreAction $action)
    {
        return $this->executeApiAction($action);
    }
}
