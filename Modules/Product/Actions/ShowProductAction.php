<?php

namespace Modules\Product\Actions;

use App\Contracts\ApiAction;
use App\Exceptions\RecordNotFoundException;
use Modules\Product\Http\Resources\ProductCommentResource;
use Modules\Product\Repositories\ProductRepo;

class ShowProductAction implements ApiAction
{
    /**
     * @throws RecordNotFoundException
     */
    public function execute()
    {
        $slug = request('slug');
        $product = ProductRepo::findBySlug($slug);

        return ProductCommentResource::make($product);
    }
}
