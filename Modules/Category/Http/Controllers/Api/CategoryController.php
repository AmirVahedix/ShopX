<?php

namespace Modules\Category\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Category\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::query()
            ->with('children')
            ->orderByDesc('order')
            ->get();
    }
}
