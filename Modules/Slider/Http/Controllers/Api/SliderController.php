<?php

namespace Modules\Slider\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Slider\Http\Resource\SliderResource;
use Modules\Slider\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $data = Slider::with('media')
            ->orderByDesc('order')
            ->get();

        return response()->json(SliderResource::collection($data));
    }
}
