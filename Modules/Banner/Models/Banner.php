<?php

namespace Modules\Banner\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Banner\Database\factories\BannerFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Banner extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    const TYPE_FULL_WIDTH = 'Full Width';
    const TYPE_HALF_WIDTH = 'Half Width';
    const types = [self::TYPE_FULL_WIDTH, self::TYPE_HALF_WIDTH];

    protected $fillable = [
        "title",
        "link",
        "type",
    ];

    protected static function newFactory()
    {
        return BannerFactory::new();
    }
}
