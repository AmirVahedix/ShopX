<?php

namespace Modules\Category\Repositories;

use Modules\Category\Models\Category;

class CategoryRepo
{
    public static function all()
    {
        return Category::query()
            ->whereNull('parent_id')
            ->with('children')
            ->get();
    }
}
