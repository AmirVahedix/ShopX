<?php

namespace Modules\Category\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Category\Http\Resources\CategoryResource;
use Modules\Category\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(
            Category::query()
                ->whereNull('parent_id')
                ->with('children')
                ->get()
        );
    }
}
