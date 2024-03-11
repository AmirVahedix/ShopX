<?php

namespace Modules\Brand\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Brand\Http\Resources\BrandResource;
use Modules\Brand\Repositories\BrandRepo;

class BrandController extends Controller
{
    public function featuring()
    {
        return BrandResource::collection(BrandRepo::featuring());
    }
}
