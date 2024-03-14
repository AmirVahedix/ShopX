<?php

namespace Modules\Category\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Category\Actions\IndexCategoriesAction;
use Modules\Category\Actions\ShowCategoryAction;
use Modules\Category\Http\Resources\CategoryProductResource;
use Modules\Category\Http\Resources\CategoryResource;
use Modules\Category\Models\Category;
use Modules\Category\Repositories\CategoryRepo;

class CategoryController extends Controller
{
    public function index(IndexCategoriesAction $action)
    {
        return $this->executeApiAction($action);
    }

    public function show($slug, ShowCategoryAction $action)
    {
        return $this->executeApiAction($action);
    }
}
