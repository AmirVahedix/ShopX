<?php

namespace Modules\Product\Repositories;

use Modules\Product\Models\Product;

class ProductRepo
{
    public static function paginate()
    {
        return Product::with('attributes')->latest()->paginate(15);
    }
}
