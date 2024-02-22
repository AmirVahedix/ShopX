<?php

namespace Modules\Category\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Category\Http\Resources\CategoryResource;
use Modules\Category\Repositories\CategoryRepo;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(CategoryRepo::all());
    }
}
