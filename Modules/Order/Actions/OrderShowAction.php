<?php

namespace Modules\Order\Actions;

use App\Contracts\ApiAction;
use App\Exceptions\RecordNotFoundException;
use App\Exceptions\UnauthorizedException;
use Modules\Order\Http\Resource\OrderResource;
use Modules\Order\Repositories\OrderRepo;

class OrderShowAction implements ApiAction
{
    /**
     * @throws RecordNotFoundException
     * @throws UnauthorizedException
     */
    public function execute()
    {
        $order = OrderRepo::safeFindBySku(request('sku'));

        return OrderResource::make($order);
    }
}
