<?php

namespace Modules\Article\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Article\Database\factories\ArticleFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "slug",
        "body",
        "meta_title",
        "meta_description",
        "views",
        "published_at",
    ];

    protected static function newFactory()
    {
        return ArticleFactory::new();
    }
}
