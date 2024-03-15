<?php

namespace Modules\Client\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \Modules\Client\Models\Client;

class ClientFactory extends Factory
{
    protected $model = Client::class;

    public function definition()
    {
        return [
            "name" => $this->faker->name,
            "phone" => '09'.$this->faker->numberBetween(100000000, 9999999999),
            "phone_verified_at" => $this->faker->randomElement([null, now()]),
            "email" => $this->faker->email,
            "email_verified_at" => $this->faker->randomElement([null, now()]),
            "ssn" => $this->faker->numberBetween(3020000000, 3020999999),
            "birth_date" => $this->faker->date,
        ];
    }
}

