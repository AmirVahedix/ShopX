<?php

namespace Modules\Order\Repositories;

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
}
