<?php

namespace Modules\Category\Repositories;

use App\Exceptions\RecordNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Models\Category;

class CategoryRepo
{
    /**
     * @throws RecordNotFoundException
     */
    public static function findBySlug(string $slug): Model
    {
        $category = Category::with('products', 'products.attributes', 'products.variants')
            ->where('slug', $slug)
            ->first();

        if (!$category) throw new RecordNotFoundException();

        return $category;
    }

    public static function all()
    {
        return Category::query()
            ->whereNull('parent_id')
            ->with('children')
            ->get();
    }

    public static function parents()
    {
        return Category::query()
            ->whereNull('parent_id')
            ->get();
    }
}
