<?php

namespace Modules\Order\Actions;

use App\Contracts\ApiAction;
use Modules\Order\Http\Resource\OrderResource;
use Modules\Order\Repositories\OrderRepo;

class OrderIndexAction implements ApiAction
{
    public function execute()
    {
        return OrderResource::collection(OrderRepo::index());
    }
}
