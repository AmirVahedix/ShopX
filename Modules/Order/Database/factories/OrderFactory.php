<?php

namespace Modules\Order\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Address\Models\Address;
use Modules\Client\Models\Client;
use \Modules\Order\Models\Order;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            "sku" => $this->faker->numberBetween(100000, 999999),
            "client_id" => Client::query()->inRandomOrder()->first(),
            "address_id" => Address::query()->inRandomOrder()->first(),
            "status" => $this->faker->randomElement(Order::statuses),
            "paid_at" => $this->faker->randomElement([null, now()]),
        ];
    }
}

