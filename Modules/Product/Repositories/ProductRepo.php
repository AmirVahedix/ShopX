<?php

namespace Modules\Product\Repositories;

use App\Exceptions\RecordNotFoundException;
use Illuminate\Database\Eloquent\Model;
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

    public static function findBySlug(string $slug): Model
    {
        $product = Product::with('attributes', 'variants', 'brand', 'comments')
            ->where('slug', $slug)
            ->first();

        if (!$product) throw new RecordNotFoundException();

        return $product;
    }
}
