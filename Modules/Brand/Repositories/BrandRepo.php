<?php

namespace Modules\Brand\Repositories;

use Modules\Brand\Models\Brand;

class BrandRepo
{
    public static function index()
    {

    }

    public static function featuring()
    {
        return Brand::with('media')
            ->where('is_featuring', true)
            ->latest()
            ->get();
    }
}
