<?php

namespace Modules\Article\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Article\Http\Resources\ArticleResource;
use Modules\Article\Repositories\ArticleRepo;

class ArticleController extends Controller
{
    public function index()
    {
        return ArticleResource::collection(ArticleRepo::paginate());
    }

    public function latest()
    {
        return ArticleResource::collection(ArticleRepo::latest());
    }
}
