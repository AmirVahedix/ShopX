<?php

namespace Modules\Category\Actions;

use App\Contracts\ApiAction;
use App\Exceptions\RecordNotFoundException;
use Modules\Category\Http\Resources\CategoryProductResource;
use Modules\Category\Repositories\CategoryRepo;

class ShowCategoryAction implements ApiAction
{

    /**
     * @throws RecordNotFoundException
     */
    public function execute()
    {
        $slug = request('slug');
        $category = CategoryRepo::findBySlug($slug);

        return CategoryProductResource::make($category);
    }
}
