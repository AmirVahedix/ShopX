<?php

namespace Modules\Article\Repositories;

use Modules\Article\Models\Article;

class ArticleRepo
{
    public static function paginate()
    {
        return Article::with('media')
            ->whereNotNull('published_at')
            ->latest()
            ->paginate(12);
    }

    public static function latest()
    {
        return Article::with('media')
            ->whereNotNull('published_at')
            ->latest()
            ->limit(4)
            ->get();
    }
}
