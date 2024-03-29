<?php

namespace Modules\Address\Database\factories;

use Modules\Address\Models\Estate;
use Modules\Address\Models\Zone;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Address\Models\Address;
use Modules\Client\Models\Client;

class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition()
    {
        $receiver_phone = $this->faker->randomElement([null, $this->faker->phoneNumber]);
        return [
            "client_id" => Client::query()->inRandomOrder()->first(),
            "zone_id" => Zone::query()->inRandomOrder()->first(),
            "estate_id" => Estate::query()->inRandomOrder()->first(),
            "address" => $this->faker->address,
            "postal_code" => $this->faker->numberBetween(1000000000, 99999999999),
            "receiver_name" => $receiver_phone === null ? null : $this->faker->name,
            "receiver_phone" => $receiver_phone,
            "is_default" => $this->faker->boolean
        ];
    }
}

