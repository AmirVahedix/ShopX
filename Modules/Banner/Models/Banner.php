<?php

namespace Modules\Banner\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Banner\Database\factories\BannerFactory;

class Banner extends Model
{
    use HasFactory;

    const TYPE_FULL_WIDTH = 'full_width';
    const TYPE_HALF_WIDTH = 'half_width';
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
