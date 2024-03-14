<?php

namespace Modules\Category\Actions;

use App\Contracts\ApiAction;
use Modules\Category\Http\Resources\CategoryResource;
use Modules\Category\Repositories\CategoryRepo;

class IndexCategoriesAction implements ApiAction
{
    public function execute()
    {
        $data = CategoryRepo::all();

        return CategoryResource::collection($data);
    }
}
