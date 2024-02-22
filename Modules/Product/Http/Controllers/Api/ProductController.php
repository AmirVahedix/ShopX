<?php

namespace Modules\Product\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Product\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return Product::query()->latest()->paginate(15);
    }
}
