<?php

namespace Modules\Product\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Product\Http\Resources\ProductResource;
use Modules\Product\Models\Product;
use Modules\Product\Repositories\ProductRepo;

class ProductController extends Controller
{
    public function index()
    {
        return ProductResource::collection(ProductRepo::paginate());
    }

    public function specialOffers()
    {
        return ProductResource::collection(ProductRepo::specialOffers());
    }

    public function bestSellers()
    {
        return ProductResource::collection(ProductRepo::bestSellers());
    }
}
