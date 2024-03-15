<?php

namespace Modules\Order\Repositories;

use App\Exceptions\RecordNotFoundException;
use App\Exceptions\UnauthorizedException;
use Modules\Order\Models\Order;

class OrderRepo
{
    public static function index()
    {
        return Order::query()
            ->where('client_id', auth()->id())
            ->latest()
            ->get();
    }

    /**
     * @throws RecordNotFoundException
     * @throws UnauthorizedException
     */
    public static function safeFindBySku(string $sku)
    {
        $order = Order::query()
            ->where('sku', $sku)
            ->first();

        if (!$order) {
            throw new RecordNotFoundException();
        }

        if ($order->client_id !== auth()->id()) {
            throw new UnauthorizedException();
        }

        return $order;
    }
}
