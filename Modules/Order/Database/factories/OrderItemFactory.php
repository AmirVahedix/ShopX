<?php

namespace Modules\Order\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Order\Models\Order;
use \Modules\Order\Models\OrderItem;
use Modules\Product\Models\Product;
use Modules\Variant\Models\Variant;

class OrderItemFactory extends Factory
{
    protected $model = OrderItem::class;

    public function definition()
    {
        return [
            "order_id" => Order::query()->inRandomOrder()->first(),
            "product_id" => Product::query()->inRandomOrder()->first(),
            "variant_id" => Variant::query()->inRandomOrder()->first(),
            "qty" => $this->faker->numberBetween(1, 5),
            "price" => $this->faker->numberBetween(10000000, 200000000),
        ];
    }
}

