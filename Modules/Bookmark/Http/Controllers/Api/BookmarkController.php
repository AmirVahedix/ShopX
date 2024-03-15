<?php

namespace Modules\Bookmark\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Bookmark\Actions\BookmarkIndexAction;

class BookmarkController extends Controller
{
    public function index(BookmarkIndexAction $action)
    {
        return $this->executeApiAction($action);
    }
}
