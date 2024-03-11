<?php

namespace Modules\Product\Repositories;

use Modules\Product\Models\Product;

class ProductRepo
{
    public static function paginate()
    {
        return Product::with('attributes', 'variants')->latest()->paginate(15);
    }

    public static function specialOffers()
    {
        return Product::with('attributes', 'variants')
            ->where('is_special_offer', true)
            ->latest()
            ->get();
    }

    public static function bestSellers()
    {
        return Product::with('attributes', 'variants')
            ->where('is_best_seller', true)
            ->latest()
            ->get();
    }
}
