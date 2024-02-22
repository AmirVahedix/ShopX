<?php

namespace Modules\Product\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \Modules\Product\Models\Product;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            "title" => $this->faker->sentence,
            "slug" => $this->faker->slug,
            "model" => $this->faker->sentence,
            "description" => $this->faker->paragraph(10),
            "price" => $this->faker->numberBetween(2000000, 200000000),
            "old_price" => $this->faker->randomElement([null, $this->faker->numberBetween(2000000, 200000000)]),
        ];
    }
}

