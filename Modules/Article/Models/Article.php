<?php

namespace Modules\Article\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Article\Database\factories\ArticleFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Article extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

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
