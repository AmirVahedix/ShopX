<?php

namespace Modules\Slider\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Slider\Http\Resource\SliderResource;
use Modules\Slider\Models\Slider;
use Modules\Slider\Repositories\SliderRepo;

class SliderController extends Controller
{
    public function index()
    {
        return SliderResource::collection(SliderRepo::index());
    }
}
