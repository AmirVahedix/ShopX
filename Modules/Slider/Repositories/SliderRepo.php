<?php

namespace Modules\Slider\Repositories;

use Modules\Slider\Models\Slider;

class SliderRepo
{
    public static function index()
    {
        return Slider::with('media')
            ->orderByDesc('order')
            ->get();
    }
}
