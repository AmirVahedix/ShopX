<?php

namespace Modules\Order\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Order\Models\Order;
use Modules\Order\Models\OrderItem;

class OrderDatabaseSeeder extends Seeder
{
    public function run()
    {
        Order::factory()->count(20)->create();
        OrderItem::factory()->count(100)->create();
    }
}
