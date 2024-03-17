<?php

namespace Modules\Banner\Repositories;

use Modules\Banner\Models\Banner;

class BannerRepo
{
    public static function getByType(string $type)
    {
        return Banner::with('media')
            ->where('type', $type)
            ->get();
    }
}
